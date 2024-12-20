<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\ByteBuffer\Concerns\Reads;

trait Integer
{
    /**
     * Reads an 8bit signed integer.
     */
    public function readInt8(int $offset = 0): int
    {
        return $this->unpack('c', $offset);
    }

    /**
     * Reads an 16bit signed integer.
     */
    public function readInt16(int $offset = 0): int
    {
        return $this->unpack('s', $offset);
    }

    /**
     * Reads an 32bit signed integer.
     */
    public function readInt32(int $offset = 0): int
    {
        return $this->unpack('l', $offset);
    }

    /**
     * Reads an 64bit signed integer.
     */
    public function readInt64(int $offset = 0): int
    {
        return $this->unpack('q', $offset);
    }

    /**
     * Reads an 8bit signed integer. This is an alias of readInt8.
     */
    public function readByte(int $offset = 0): int
    {
        return $this->readInt8($offset);
    }

    /**
     * Reads an 16bit signed integer. This is an alias of readInt16.
     */
    public function readShort(int $offset = 0): int
    {
        return $this->readInt16($offset);
    }

    /**
     * Reads an 32bit signed integer. This is an alias of readInt32.
     */
    public function readInt(int $offset = 0): int
    {
        return $this->readInt32($offset);
    }

    /**
     * Reads an 64bit signed integer. This is an alias of readInt64.
     */
    public function readLong(int $offset = 0): int
    {
        return $this->readInt64($offset);
    }
}
