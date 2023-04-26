<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns\Reads;

use BombenProdukt\ByteBuffer\ByteBuffer;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class HexTest extends TestCase
{
    public function test_it_should_read_hex(): void
    {
        $buffer = ByteBuffer::new(0);
        $buffer->writeHex('48656c6c6f20576f726c64');
        $buffer->position(0);

        self::assertSame(11, $buffer->internalSize());
        self::assertSame('48656c6c6f20576f726c64', $buffer->readHex(22));
    }

    public function test_it_should_read_hex_as_string(): void
    {
        $buffer = ByteBuffer::new(0);
        $buffer->writeHex('48656c6c6f20576f726c64');
        $buffer->position(0);

        self::assertSame(11, $buffer->internalSize());
        self::assertSame('Hello World', $buffer->readHexString(22));
    }
}
