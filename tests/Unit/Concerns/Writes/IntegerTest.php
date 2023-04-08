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
final class IntegerTest extends TestCase
{
    public function test_it_should_write_int8(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeInt8(8);

        self::assertSame(1, $buffer->internalSize());
    }

    public function test_it_should_write_int16(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeInt16(16);

        self::assertSame(2, $buffer->internalSize());
    }

    public function test_it_should_write_int32(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeInt32(32);

        self::assertSame(4, $buffer->internalSize());
    }

    public function test_it_should_write_int64(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeInt64(64);

        self::assertSame(8, $buffer->internalSize());
    }

    public function test_it_should_write_byte(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeByte(8);

        self::assertSame(1, $buffer->internalSize());
    }

    public function test_it_should_write_short(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeShort(16);

        self::assertSame(2, $buffer->internalSize());
    }

    public function test_it_should_write_int(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeInt(32);

        self::assertSame(4, $buffer->internalSize());
    }

    public function test_it_should_write_long(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeLong(64);

        self::assertSame(8, $buffer->internalSize());
    }
}
