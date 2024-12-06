<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\ByteBuffer\Concerns;

trait Transformable
{
    /**
     * Get the buffer as a binary string.
     */
    public function toBinary(int $offset = 0, int $length = 0): string
    {
        return \implode('', $this->toArray($offset, $length));
    }

    /**
     * Get the buffer as a hex string.
     */
    public function toHex(int $offset = 0, int $length = 0): string
    {
        return \unpack('H*', $this->toBinary($offset, $length))[1];
    }

    /**
     * Get the buffer as a UTF-8 string.
     */
    public function toUTF8(int $offset = 0, int $length = 0): string
    {
        return \mb_convert_encoding($this->toBinary($offset, $length), 'UTF-8', 'UTF-8');
    }

    /**
     * Get the buffer as a base64 string.
     */
    public function toBase64(int $offset = 0, int $length = 0): string
    {
        return \base64_encode($this->toBinary($offset, $length));
    }

    /**
     * Get the buffer as an array.
     */
    public function toArray(int $offset = 0, int $length = 0): array
    {
        return $this->slice($offset, $length);
    }

    /**
     * Get the buffer as a GMP object.
     */
    public function toGmp(): \GMP
    {
        return \gmp_init($this->toHex(), 16);
    }

    /**
     * Get the buffer as a GMP object and turn it into an integer.
     */
    public function toGmpInt(): int
    {
        return \gmp_intval($this->toGmp());
    }

    /**
     * Get the buffer as a GMP object and turn it into a string.
     */
    public function toGmpString(): string
    {
        return \gmp_strval($this->toGmp(), 10);
    }

    /**
     * Get the buffer as a string.
     */
    public function toString(string $encoding, int $offset = 0, int $length = 0): string
    {
        return match ($encoding) {
            'binary' => $this->toBinary($offset, $length),
            'hex' => $this->toHex($offset, $length),
            'base64' => $this->toBase64($offset, $length),
            'utf8' => $this->toUTF8($offset, $length),
            default => throw new \InvalidArgumentException(\sprintf('The encoding [%s] is not supported.', $encoding)),
        };
    }
}
