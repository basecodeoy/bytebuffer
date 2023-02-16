<?php

declare(strict_types=1);

namespace PreemStudio\ByteBuffer\Concerns\Writes;

trait Strings
{
    /**
     * Writes a payload of bytes. This is an alias of append.
     */
    public function writeBytes(string $value, int $offset = 0): self
    {
        return $this->append($value, $offset);
    }

    /**
     * Writes an UTF8 encoded string. This is an alias of writeUTF8String.
     */
    public function writeString(string $value, int $offset = 0): self
    {
        return $this->writeUTF8String($value, $offset);
    }

    /**
     * Writes an UTF8 encoded string.
     */
    public function writeUTF8String(string $value, int $offset = 0): self
    {
        $value  = mb_convert_encoding($value, 'UTF-8', 'ISO-8859-1');
        $length = strlen($value);

        return $this->pack("a{$length}", $value, $offset);
    }

    /**
     * Writes a NULL-terminated UTF8 encoded string.
     */
    public function writeCString(string $value, int $offset = 0): self
    {
        $value  = mb_convert_encoding($value.' ', 'UTF-8', 'ISO-8859-1');
        $length = strlen($value);

        return $this->pack("Z{$length}", $value, $offset);
    }

    /**
     * Writes a length as uint32 prefixed UTF8 encoded string.
     */
    public function writeIString(string $value, int $offset = 0): self
    {
        $this->fill(3);
        $this->pack('C', strlen($value), 0);

        return $this->writeUTF8String($value, $offset);
    }

    /**
     * Writes a length as varint32 prefixed UTF8 encoded string.
     */
    public function writeVString(string $value, int $offset = 0): self
    {
        $this->pack('C', strlen($value), 0);

        return $this->writeUTF8String($value, $offset);
    }
}
