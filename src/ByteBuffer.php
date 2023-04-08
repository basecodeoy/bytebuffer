<?php

declare(strict_types=1);

namespace PreemStudio\ByteBuffer;

use InvalidArgumentException;

final class ByteBuffer
{
    use Concerns\Initialisable;
    use Concerns\Offsetable;
    use Concerns\Positionable;
    use Concerns\Readable;
    use Concerns\Sizeable;
    use Concerns\Transformable;
    use Concerns\Writeable;

    /**
     * Backing ArrayBuffer.
     *
     * @var array
     */
    private $buffer = [];

    /**
     * Absolute read/write offset.
     *
     * @var int
     */
    private $offset = 0;

    /**
     * Absolute length of the contained data.
     *
     * @var int
     */
    private $length;

    /**
     * Whether to use big endian, little endian or machine byte order.
     *
     * @var int
     */
    private $order = 1;

    /**
     * Constructs a new ByteBuffer.
     *
     * @param mixed $value
     */
    private function __construct($value)
    {
        switch (\gettype($value)) {
            case 'array':
                $this->initializeBuffer(\count($value), $value);

                break;

            case 'integer':
                $this->initializeBuffer($value, \pack("x{$value}"));

                break;

            case 'string':
                $this->initializeBuffer(\mb_strlen($value), $value);

                break;

            default:
                throw new InvalidArgumentException('Constructor argument must be a binary string or integer.');
        }
    }

    /**
     * Dynamically retrieve a value from the buffer.
     *
     * @param mixed $offset
     */
    public function __get($offset)
    {
        return $this->offsetGet($offset);
    }

    /**
     * Dynamically set a value in the buffer.
     *
     * @param mixed $offset
     * @param mixed $value
     */
    public function __set($offset, $value): void
    {
        $this->offsetSet($offset, $value);
    }

    /**
     * Dynamically check if a value in the buffer is set.
     *
     * @param mixed $offset
     */
    public function __isset($offset)
    {
        return $this->offsetExists($offset);
    }

    /**
     * Dynamically unset a value in the buffer.
     *
     * @param mixed $offset
     */
    public function __unset($offset): void
    {
        $this->offsetUnset($offset);
    }

    /**
     * Allocates a new ByteBuffer backed by a buffer with the specified data.
     *
     * @param mixed $value
     */
    public static function new($value): self
    {
        return new self($value);
    }

    /**
     * Allocates a new ByteBuffer backed by a buffer of the specified capacity.
     */
    public static function allocate(int $capacity): self
    {
        if ($capacity < 0) {
            throw new InvalidArgumentException('Negative integers not supported by ByteBuffer.');
        }

        return new self($capacity);
    }

    /**
     * Initialise a new buffer from the given content.
     *
     * @param mixed $content
     */
    public function initializeBuffer(int $length, $content): void
    {
        for ($i = 0; $i < $length; $i++) {
            $this->buffer[$i] = $content[$i];
        }

        $this->length = $length;
    }

    /**
     * Pack data into a binary string.
     *
     * @param mixed $value
     */
    public function pack(string $format, $value, int $offset): self
    {
        $this->skip($offset);

        $bytes = \pack($format, $value);

        for ($i = 0; $i < \mb_strlen($bytes); $i++) {
            $this->buffer[$this->offset++] = $bytes[$i];
        }

        return $this;
    }

    /**
     * Unpack data from a binary string.|int
     */
    public function unpack(string $format, int $offset = 0)
    {
        $this->skip($offset);

        $value = \unpack($format, $this->toBinary(), $this->offset)[1];

        $this->skip(LengthMap::get($format));

        return $value;
    }

    /**
     * Get a value from the buffer.
     */
    public function get(int $offset)
    {
        return $this->offsetGet($offset);
    }

    /**
     * Concatenates multiple ByteBuffers into one.
     */
    public static function concat(...$buffers): self
    {
        $initial = $buffers[0];

        foreach (\array_slice($buffers, 1) as $buffer) {
            $initial->append($buffer);
        }

        return $initial;
    }

    /**
     * Appends some data to this ByteBuffer.
     *
     * @param mixed $value
     */
    public function append($value, int $offset = 0): self
    {
        if ($value instanceof self) {
            $value = $value->toArray($offset);
        }

        if (\is_string($value)) {
            $value = \mb_str_split($value);
        }

        $buffer = \array_merge($this->buffer, $value);

        $bufferCount = \count($buffer);
        $this->initializeBuffer($bufferCount, $buffer);
        $this->position($bufferCount); // move current offset to the end of merged buffer after append

        return $this;
    }

    /**
     * Appends this ByteBuffers contents to another ByteBuffer.
     */
    public function appendTo(self $buffer, int $offset = 0): self
    {
        return $buffer->append($this);
    }

    /**
     * Prepends some data to this ByteBuffer.
     *
     * @param mixed $value
     */
    public function prepend($value, int $offset = 0): self
    {
        if ($value instanceof self) {
            $value = $value->toArray($offset);
        }

        if (\is_string($value)) {
            $value = \mb_str_split($value);
        }

        $buffer = $this->buffer;

        foreach (\array_reverse($value) as $item) {
            \array_unshift($buffer, $item);
        }

        $bufferCount = \count($buffer);
        $this->initializeBuffer($bufferCount, $buffer);
        $this->position($bufferCount); // move current offset to the end of merged buffer after prepend

        return $this;
    }

    /**
     * Prepends this ByteBuffers contents to another ByteBuffer.
     */
    public function prependTo(self $buffer, int $offset = 0): self
    {
        return $buffer->prepend($this, $offset);
    }

    /**
     * Overwrites this ByteBuffers contents with the specified value.
     */
    public function fill(int $length, int $start = 0): self
    {
        if ($start > 0) {
            $this->position($start);
        }

        for ($i = 0; $i < $length; $i++) {
            $this->buffer[$this->offset++] = \pack('x');
        }

        return $this;
    }

    /**
     * Flip byte order of this buffers contents.
     */
    public function flip(int $start = 0, int $length = 0): self
    {
        $reversed = \array_reverse($this->slice($start, $length));

        $this->initializeBuffer(\count($reversed), $reversed);

        return $this;
    }

    /**
     * Reverses this ByteBuffers contents. This is an alias of flip.
     */
    public function reverse(int $start = 0, int $length = 0): self
    {
        return $this->flip($start, $length);
    }

    /**
     * Sets the byte order.
     */
    public function order(int $value): self
    {
        $this->order = $value;

        return $this;
    }

    /**
     * Extract a slice of the ByteBuffer.
     */
    public function slice(int $offset, int $length): array
    {
        if ($offset > $this->capacity()) {
            throw new InvalidArgumentException('Start exceeds buffer length');
        }

        if ($length <= 0) {
            return $this->buffer;
        }

        if ($length > $this->capacity()) {
            throw new InvalidArgumentException('Length exceeds buffer length');
        }

        return \array_slice($this->buffer, $offset, $length);
    }

    /**
     * Determine if the given value is a ByteBuffer.
     */
    public function equals(self $buffer): bool
    {
        return $buffer->capacity() === $this->capacity()
             && $buffer->toBinary() === $this->toBinary();
    }

    /**
     * Determine if the given value is a ByteBuffer.
     *
     * @param mixed $value
     */
    public static function isByteBuffer($value): bool
    {
        return $value instanceof self;
    }

    /**
     * Determine if the byte order is set to big endian.
     */
    public function isBigEndian(): bool
    {
        return ByteOrder::BE === $this->order;
    }

    /**
     * Determine if the byte order is set to little endian.
     */
    public function isLittleEndian(): bool
    {
        return ByteOrder::LE === $this->order;
    }

    /**
     * Determine if the byte order is set to machine byte.
     */
    public function isMachineByte(): bool
    {
        return ByteOrder::MB === $this->order;
    }
}
