<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\ByteBuffer\Concerns\Writes;

trait Floats
{
    /**
     * Writes a 32bit float.
     */
    public function writeFloat32(float $value, int $offset = 0): self
    {
        return $this->pack(['G', 'g', 'f'][$this->order], $value, $offset);
    }

    /**
     * Writes a 64bit float.
     */
    public function writeFloat64(float $value, int $offset = 0): self
    {
        return $this->pack(['E', 'e', 'd'][$this->order], $value, $offset);
    }

    /**
     * Writes a 64bit float. This is an alias of writeFloat64.
     */
    public function writeDouble(float $value, int $offset = 0): self
    {
        return $this->writeFloat64($value, $offset);
    }
}
