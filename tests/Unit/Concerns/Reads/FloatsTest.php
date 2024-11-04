<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns\Reads;

use BaseCodeOy\ByteBuffer\ByteBuffer;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class FloatsTest extends TestCase
{
    public function test_it_should_read_float32(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeFloat32(8.0);
        $buffer->position(0);

        self::assertSame(8.0, $buffer->readFloat32());
    }

    public function test_it_should_read_float64(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeFloat64(8.0);
        $buffer->position(0);

        self::assertSame(8.0, $buffer->readFloat64());
    }

    public function test_it_should_read_double(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeDouble(8.0);
        $buffer->position(0);

        self::assertSame(8.0, $buffer->readDouble());
    }
}
