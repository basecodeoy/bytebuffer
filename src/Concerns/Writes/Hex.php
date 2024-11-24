<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\ByteBuffer\Concerns\Writes;

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
