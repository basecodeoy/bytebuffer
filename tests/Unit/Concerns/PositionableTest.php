<?php

declare(strict_types=1);

namespace Tests\Unit\Concerns\Reads;

use PHPUnit\Framework\TestCase;
use PreemStudio\ByteBuffer\ByteBuffer;

/**
 * @internal
 *
 * @coversNothing
 */
final class PositionableTest extends TestCase
{
    public function test_it_should_current_the_offset(): void
    {
        $buffer = ByteBuffer::new(8);
        $buffer->current();

        self::assertSame(0, $buffer->current());
    }

    public function test_it_should_set_the_offset_to_the_given_value(): void
    {
        $buffer = ByteBuffer::new(8);
        $buffer->position(5);

        self::assertSame(5, $buffer->current());
    }

    public function test_it_should_skip_the_given_number_of_bytes(): void
    {
        $buffer = ByteBuffer::new(8);
        $buffer->skip(2);
        $buffer->skip(3);
        $buffer->skip(1);

        self::assertSame(6, $buffer->current());
    }

    public function test_it_should_rewind_the_given_number_of_bytes(): void
    {
        $buffer = ByteBuffer::new(8);
        $buffer->position(5);
        $buffer->rewind(3);
        $buffer->rewind(1);

        self::assertSame(1, $buffer->current());
    }

    public function test_it_should_reset_the_offset(): void
    {
        $buffer = ByteBuffer::new(8);
        $buffer->position(5);
        self::assertSame(5, $buffer->current());

        $buffer->reset();
        self::assertSame(0, $buffer->current());
    }

    public function test_it_should_clear_the_offset(): void
    {
        $buffer = ByteBuffer::new(8);
        $buffer->position(5);
        self::assertSame(5, $buffer->current());
        self::assertSame(8, $buffer->capacity());

        $buffer->clear();
        self::assertSame(0, $buffer->current());
        self::assertSame(8, $buffer->capacity());
    }
}
