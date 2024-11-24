<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\ByteBuffer\Concerns\Reads;

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
        return \pack('H*', $this->readHex($length));
    }
}
