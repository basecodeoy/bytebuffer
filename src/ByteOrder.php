<?php

declare(strict_types=1);

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
