<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\ByteBuffer\Concerns;

trait Sizeable
{
    /**
     * Gets the length of this ByteBuffers backing buffer.
     */
    public function capacity(): int
    {
        return $this->length;
    }

    /**
     * Gets the length of the value stored in this ByteBuffer.
     */
    public function internalSize(): int
    {
        return \count($this->buffer);
    }

    /**
     * Makes sure that this ByteBuffer is backed by a buffer of at least the specified capacity.
     */
    public function ensureCapacity(int $capacity): self
    {
        $current = $this->capacity();

        if ($current < $capacity) {
            return $this->resize($capacity);
        }

        return $this;
    }

    /**
     * Resizes this ByteBuffer to be backed by a buffer of at least the given capacity.
     */
    public function resize(int $capacity): self
    {
        $current = $this->buffer;

        $this->initializeBuffer($capacity, \pack("x{$capacity}"));

        $this->buffer = \array_replace($this->buffer, $current);

        return $this;
    }

    /**
     * Gets the number of remaining readable bytes.
     */
    public function remaining(): int
    {
        return $this->capacity() - $this->offset;
    }
}
