<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns\Reads;

use PHPUnit\Framework\TestCase;
use BombenProdukt\ByteBuffer\ByteBuffer;

/**
 * @internal
 *
 * @coversNothing
 */
final class IntegerTest extends TestCase
{
    public function test_it_should_read_int8(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeInt8(8);
        $buffer->position(0);

        self::assertSame(8, $buffer->readInt8());
    }

    public function test_it_should_read_int16(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeInt16(16);
        $buffer->position(0);

        self::assertSame(16, $buffer->readInt16());
    }

    public function test_it_should_read_int32(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeInt32(32);
        $buffer->position(0);

        self::assertSame(32, $buffer->readInt32());
    }

    public function test_it_should_read_int64(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeInt64(64);
        $buffer->position(0);

        self::assertSame(64, $buffer->readInt64());
    }

    public function test_it_should_read_byte(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeByte(8);
        $buffer->position(0);

        self::assertSame(8, $buffer->readByte());
    }

    public function test_it_should_read_short(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeShort(16);
        $buffer->position(0);

        self::assertSame(16, $buffer->readShort());
    }

    public function test_it_should_read_int(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeInt(32);
        $buffer->position(0);

        self::assertSame(32, $buffer->readInt());
    }

    public function test_it_should_read_long(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeLong(64);
        $buffer->position(0);

        self::assertSame(64, $buffer->readLong());
    }
}
