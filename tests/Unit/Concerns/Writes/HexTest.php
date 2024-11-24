<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Concerns\Writes;

use BaseCodeOy\ByteBuffer\ByteBuffer;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class HexTest extends TestCase
{
    public function test_it_should_write_hex(): void
    {
        $buffer = ByteBuffer::new(0);
        $buffer->writeHex('48656c6c6f20576f726c64');
        $buffer->position(0);

        self::assertSame(11, $buffer->internalSize());
        self::assertSame('Hello World', $buffer->readHexString(22));
    }
}
