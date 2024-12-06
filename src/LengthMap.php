<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\ByteBuffer;

final class LengthMap
{
    /**
     * Available formats and the bit size required to store them.
     *
     * @var array
     */
    public const array LENGTHS = [
        // Chars (8 bit)
        'c' => 1,
        'C' => 1,

        // Signed Short (16 bit)
        's' => 2,

        // Unsigned Short (16 bit)
        'n' => 2,
        'S' => 2,
        'v' => 2,

        // Signed Long  (32 bit)
        'l' => 4,

        // Unsigned Long  (32 bit)
        'L' => 4,
        'N' => 4,
        'V' => 4,

        // Signed Long Long (64 bit)
        'q' => 8,

        // Unsigned Long Long (64 bit)
        'J' => 8,
        'P' => 8,
        'Q' => 8,

        // Float (32 bit)
        'G' => 4,
        'g' => 4,
        'f' => 4,

        // Float (64 bit)
        'E' => 8,
        'e' => 8,
        'd' => 8,
    ];

    /**
     * Get a value from the list of lengths.
     */
    public static function get(string $format): int
    {
        if (\in_array($format[0], ['a', 'd', 'f', 'Z'], true)) {
            return (int) \substr($format, 1);
        }

        if (\in_array($format[0], ['h', 'H'], true)) {
            return (int) \substr($format, 1) / 2;
        }

        if (!\array_key_exists($format, self::LENGTHS)) {
            throw new \InvalidArgumentException(\sprintf('The given format [%s] is not supported.', $format));
        }

        return self::LENGTHS[$format];
    }
}
