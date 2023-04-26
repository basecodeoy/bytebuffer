<?php

declare(strict_types=1);

namespace BombenProdukt\ByteBuffer\Concerns\Writes;

trait Hex
{
    /**
     * Writes a base16 encoded string.
     */
    public function writeHex(string $value, int $offset = 0): self
    {
        $length = \mb_strlen($value);

        return $this->pack("H{$length}", $value, $offset);
    }
}
