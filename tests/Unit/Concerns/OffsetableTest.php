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
final class OffsetableTest extends TestCase
{
    public function test_it_should_get_the_value_at_the_given_offset(): void
    {
        $buffer = ByteBuffer::new('Hello World');

        self::assertSame('e', $buffer->offsetGet(1));
    }

    public function test_it_should_set_the_value_at_the_given_offset(): void
    {
        $buffer = ByteBuffer::new('Hello World');
        $buffer->offsetSet(1, 'X');

        self::assertSame('X', $buffer->offsetGet(1));
    }

    public function test_it_should_check_if_the_offset_exists(): void
    {
        $buffer = ByteBuffer::new('Hello World');

        self::assertTrue($buffer->offsetExists(1));
    }

    public function test_it_should_unset_the_value_at_the_given_offset(): void
    {
        $buffer = ByteBuffer::new('Hello World');
        $buffer->offsetUnset(1);

        self::assertFalse($buffer->offsetExists(1));
    }
}
