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
final class FloatsTest extends TestCase
{
    public function test_it_should_write_float32(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeFloat32(8.0);

        self::assertSame(4, $buffer->internalSize());
    }

    public function test_it_should_write_float64(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeFloat64(8.0);

        self::assertSame(8, $buffer->internalSize());
    }

    public function test_it_should_write_double(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeDouble(8.0);

        self::assertSame(8, $buffer->internalSize());
    }
}
