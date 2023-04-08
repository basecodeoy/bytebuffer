<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns\Writes;

use PHPUnit\Framework\TestCase;
use PreemStudio\ByteBuffer\ByteBuffer;

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
