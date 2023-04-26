<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns\Writes;

use BombenProdukt\ByteBuffer\ByteBuffer;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class UnsignedIntegerTest extends TestCase
{
    public function test_it_should_write_uint8(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUInt8(8);

        self::assertSame(1, $buffer->internalSize());
    }

    public function test_it_should_write_uint16(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUInt16(16);

        self::assertSame(2, $buffer->internalSize());
    }

    public function test_it_should_write_uint32(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUInt32(32);

        self::assertSame(4, $buffer->internalSize());
    }

    public function test_it_should_write_uint64(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUInt64(64);

        self::assertSame(8, $buffer->internalSize());
    }

    public function test_it_should_write_ubyte(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUByte(8);

        self::assertSame(1, $buffer->internalSize());
    }

    public function test_it_should_write_ushort(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUShort(15);

        self::assertSame(2, $buffer->internalSize());
    }

    public function test_it_should_write_uint(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUInt(32);

        self::assertSame(4, $buffer->internalSize());
    }

    public function test_it_should_write_ulong(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeULong(64);

        self::assertSame(8, $buffer->internalSize());
    }
}
