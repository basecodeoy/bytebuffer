<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns\Writes;

use BaseCodeOy\ByteBuffer\ByteBuffer;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class StringsTest extends TestCase
{
    public function test_it_should_write_bytes(): void
    {
        $buffer = ByteBuffer::new(0);
        $buffer->writeBytes('Hello World');

        self::assertSame(11, $buffer->internalSize());
    }

    public function test_it_should_write_string(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeString('Hello World');

        self::assertSame(11, $buffer->internalSize());
    }

    public function test_it_should_write_utf8_string(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUTF8String('Hello World 😄');

        self::assertSame(20, $buffer->internalSize());
    }

    public function test_it_should_write_c_string(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeCString('Hello World');

        self::assertSame(12, $buffer->internalSize());
        self::assertSame('48656c6c6f20576f726c6400', $buffer->toHex());
    }

    public function test_it_should_write_i_string(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeIString('Hello World');

        self::assertSame(15, $buffer->internalSize());
        self::assertSame('0000000b48656c6c6f20576f726c64', $buffer->toHex());
    }

    public function test_it_should_write_v_string(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeVString('Hello World');

        self::assertSame(12, $buffer->internalSize());
        self::assertSame('0b48656c6c6f20576f726c64', $buffer->toHex());
    }
}
