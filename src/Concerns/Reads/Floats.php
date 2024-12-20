<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\ByteBuffer\Concerns\Reads;

trait Floats
{
    /**
     * Reads a 32bit float.
     */
    public function readFloat32(int $offset = 0): float
    {
        return $this->unpack(['G', 'g', 'f'][$this->order], $offset);
    }

    /**
     * Reads a 64bit float.
     */
    public function readFloat64(int $offset = 0): float
    {
        return $this->unpack(['E', 'e', 'd'][$this->order], $offset);
    }

    /**
     * Reads a 64bit float. This is an alias of readFloat64.
     */
    public function readDouble(int $offset = 0): float
    {
        return $this->readFloat64($offset);
    }
}
