<?php

declare(strict_types=1);

namespace BombenProdukt\ByteBuffer\Concerns;

trait Positionable
{
    /**
     * Gets the absolute read/write offset.
     */
    public function current(): int
    {
        return $this->offset;
    }

    /**
     * Sets this ByteBuffers absolute read/write offset.
     */
    public function position(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * Skips N amount of bytes.
     */
    public function skip(int $length): self
    {
        $this->offset += $length;

        return $this;
    }

    /**
     * Rewinds N amount of bytes.
     */
    public function rewind(int $length): self
    {
        $this->offset -= $length;

        return $this;
    }

    /**
     * Resets this ByteBuffers offset.
     */
    public function reset(): self
    {
        $this->offset = 0;

        return $this;
    }

    /**
     * Clears this ByteBuffers offsets.
     */
    public function clear(): self
    {
        $this->offset = 0;
        $this->length = \count($this->buffer);

        return $this;
    }
}
