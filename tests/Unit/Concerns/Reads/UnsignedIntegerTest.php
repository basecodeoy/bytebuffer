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
final class UnsignedIntegerTest extends TestCase
{
    public function test_it_should_read_uint8(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUInt8(8);
        $buffer->position(0);

        self::assertSame(8, $buffer->readUInt8());
    }

    public function test_it_should_read_uint16(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUInt16(16);
        $buffer->position(0);

        self::assertSame(16, $buffer->readUInt16());
    }

    public function test_it_should_read_uint32(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUInt32(32);
        $buffer->position(0);

        self::assertSame(32, $buffer->readUInt32());
    }

    public function test_it_should_read_uint64(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUInt64(64);
        $buffer->position(0);

        self::assertSame(64, $buffer->readUInt64());
    }

    public function test_it_should_read_ubyte(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUByte(8);
        $buffer->position(0);

        self::assertSame(8, $buffer->readUByte());
    }

    public function test_it_should_read_ushort(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUShort(15);
        $buffer->position(0);

        self::assertSame(15, $buffer->readUShort());
    }

    public function test_it_should_read_uint(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUInt(32);
        $buffer->position(0);

        self::assertSame(32, $buffer->readUInt());
    }

    public function test_it_should_read_ulong(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeULong(64);
        $buffer->position(0);

        self::assertSame(64, $buffer->readULong());
    }
}
