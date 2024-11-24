<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\ByteBuffer;

final class ByteOrder
{
    /**
     * Most significant value in the sequence is stored first. Flip no bytes!
     */
    public const BE = 0;

    /**
     * Least significant value in the sequence is stored first. Flip bytes!
     */
    public const LE = 1;

    /**
     * Let the current machine determine the endianess.
     */
    public const MB = 2;
}
