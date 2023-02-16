<?php

declare(strict_types=1);

namespace PreemStudio\ByteBuffer\Concerns\Reads;

trait Hex
{
    /**
     * Reads a base16 encoded string.
     */
    public function readHex(int $length): string
    {
        return $this->unpack("H{$length}");
    }

    /**
     * Reads a base16 encoded string and decode it to binary.
     */
    public function readHexString(int $length): string
    {
        return pack('H*', $this->readHex($length));
    }
}
