<?php

declare(strict_types=1);

namespace BaseCodeOy\ByteBuffer\Concerns\Writes;

trait Integer
{
    /**
     * Writes a 8bit signed integer.
     */
    public function writeInt8(int $value, int $offset = 0): self
    {
        return $this->pack('c', $value, $offset);
    }

    /**
     * Writes a 16bit signed integer.
     */
    public function writeInt16(int $value, int $offset = 0): self
    {
        return $this->pack('s', $value, $offset);
    }

    /**
     * Writes a 32bit signed integer.
     */
    public function writeInt32(int $value, int $offset = 0): self
    {
        return $this->pack('l', $value, $offset);
    }

    /**
     * Writes a 64bit signed integer.
     */
    public function writeInt64(int $value, int $offset = 0): self
    {
        return $this->pack('q', $value, $offset);
    }

    /**
     * Writes an 8bit signed integer. This is an alias of writeInt8.
     */
    public function writeByte(int $value, int $offset = 0): self
    {
        return $this->writeInt8($value, $offset);
    }

    /**
     * Writes a 16bit signed integer. This is an alias of writeInt16.
     */
    public function writeShort(int $value, int $offset = 0): self
    {
        return $this->writeInt16($value, $offset);
    }

    /**
     * Writes a 32bit signed integer. This is an alias of writeInt32.
     */
    public function writeInt(int $value, int $offset = 0): self
    {
        return $this->writeInt32($value, $offset);
    }

    /**
     * Writes a 64bit signed integer. This is an alias of writeInt64.
     */
    public function writeLong(int $value, int $offset = 0): self
    {
        return $this->writeInt64($value, $offset);
    }
}
