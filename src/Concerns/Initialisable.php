<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\ByteBuffer\Concerns;

trait Initialisable
{
    /**
     * Creates a ByteBuffer from a binary string.
     */
    public static function fromBinary(string $value): self
    {
        return new self($value);
    }

    /**
     * Creates a ByteBuffer from a hex string.
     */
    public static function fromHex(string $value): self
    {
        if ($value !== '' && !\ctype_xdigit($value)) {
            throw new \InvalidArgumentException('Buffer::hex: non-hex character passed');
        }

        return new self(\pack('H*', $value));
    }

    /**
     * Creates a ByteBuffer from a UTF-8 string.
     */
    public static function fromUTF8(string $value): self
    {
        return new self(\mb_convert_encoding($value, 'UTF-8', 'UTF-8'));
    }

    /**
     * Creates a ByteBuffer from a base64 string.
     */
    public static function fromBase64(string $value): self
    {
        return new self(\base64_decode($value, true));
    }

    /**
     * Creates a ByteBuffer from an array.
     */
    public static function fromArray(array $value): self
    {
        return new self($value);
    }

    /**
     * Get the buffer as a plain string.
     */
    public static function fromString(string $value, string $encoding): self
    {
        return match ($encoding) {
            'binary' => static::fromBinary($value),
            'hex' => static::fromHex($value),
            'utf8' => static::fromUTF8($value),
            'base64' => static::fromBase64($value),
            default => throw new \InvalidArgumentException(\sprintf('The encoding [%s] is not supported.', $encoding)),
        };
    }
}
