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
final class SizeableTest extends TestCase
{
    public function test_it_should_return_the_capacity(): void
    {
        $buffer = ByteBuffer::new(8);

        self::assertSame(8, $buffer->capacity());
    }

    public function test_it_should_return_the_internal_capacity(): void
    {
        $buffer = ByteBuffer::new(8);

        self::assertSame(8, $buffer->internalSize());
    }

    public function test_it_should_ensure_the_given_capacity(): void
    {
        $buffer = ByteBuffer::new('Hello World');
        $buffer->ensureCapacity(32);

        self::assertSame(32, $buffer->capacity());
    }

    public function test_it_should_keep_the_given_capacity(): void
    {
        $buffer = ByteBuffer::new('Hello World');

        self::assertInstanceOf(ByteBuffer::class, $buffer->ensureCapacity(5));
        self::assertSame(11, $buffer->capacity());
    }

    public function test_it_should_resize_the_buffer(): void
    {
        $buffer = ByteBuffer::new('Hello World');
        $buffer->resize(32);

        self::assertSame(32, $buffer->capacity());
    }

    public function test_it_should_return_the_remaining_bytes(): void
    {
        $buffer = ByteBuffer::new('Hello World');
        $buffer->remaining();

        self::assertSame(11, $buffer->remaining());
    }
}
