<?php

declare(strict_types=1);

namespace BombenProdukt\ByteBuffer\Concerns\Writes;

/**
 * This is the unsigned integer writer trait.
 *
 * @author Brian Faust <brian@konceiver.dev>
 */
trait UnsignedInteger
{
    /**
     * Writes an 8bit unsigned integer.
     */
    public function writeUInt8(int $value, int $offset = 0): self
    {
        return $this->pack('C', $value, $offset);
    }

    /**
     * Writes an icbit unsigned integer.
     */
    public function writeUInt16(int $value, int $offset = 0): self
    {
        return $this->pack(['n', 'v', 'S'][$this->order], $value, $offset);
    }

    /**
     * Writes an 32bit unsigned integer.
     */
    public function writeUInt32(int $value, int $offset = 0): self
    {
        return $this->pack(['N', 'V', 'L'][$this->order], $value, $offset);
    }

    /**
     * Writes an 64bit unsigned integer.
     */
    public function writeUInt64(int $value, int $offset = 0): self
    {
        return $this->pack(['J', 'P', 'Q'][$this->order], $value, $offset);
    }

    /**
     * Writes an 8bit unsigned integer. This is an alias of writeUInt8.
     */
    public function writeUByte(int $value, int $offset = 0): self
    {
        return $this->writeUInt8($value, $offset);
    }

    /**
     * Writes an 16bit unsigned integer. This is an alias of writeUInt16.
     */
    public function writeUShort(int $value, int $offset = 0): self
    {
        return $this->writeUInt16($value, $offset);
    }

    /**
     * Writes an 32bit unsigned integer. This is an alias of writeUInt32.
     */
    public function writeUInt(int $value, int $offset = 0): self
    {
        return $this->writeUInt32($value, $offset);
    }

    /**
     * Writes an 64bit unsigned integer. This is an alias of writeUInt64.
     */
    public function writeULong(int $value, int $offset = 0): self
    {
        return $this->writeUInt64($value, $offset);
    }
}
