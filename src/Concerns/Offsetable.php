<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\ByteBuffer\Concerns;

trait Offsetable
{
    /**
     * Get the value for a given offset.
     */
    public function offsetGet(int $offset)
    {
        return $this->buffer[$offset];
    }

    /**
     * Set the value at the given offset.
     *
     * @param mixed $value
     */
    public function offsetSet(int $offset, $value): void
    {
        $this->buffer[$offset] = $value;
    }

    /**
     * Determine if the given offset exists.
     */
    public function offsetExists(int $offset): bool
    {
        return \array_key_exists($offset, $this->buffer);
    }

    /**
     * Unset the value at the given offset.
     */
    public function offsetUnset(int $offset): void
    {
        unset($this->buffer[$offset]);
    }
}
