<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use PreemStudio\ByteBuffer\ByteBuffer;

/**
 * @internal
 *
 * @coversNothing
 */
final class ByteBufferTest extends TestCase
{
    public function test_it_should_get_the_value_at_the_given_offset(): void
    {
        $buffer = ByteBuffer::new('Hello World');

        self::assertSame('e', $buffer->__get(1));
    }

    public function test_it_should_set_the_value_at_the_given_offset(): void
    {
        $buffer = ByteBuffer::new('Hello World');
        $buffer->__set(1, 'X');

        self::assertSame('X', $buffer->__get(1));
    }

    public function test_it_should_check_if_the_offset_exists(): void
    {
        $buffer = ByteBuffer::new('Hello World');

        self::assertTrue($buffer->__isset(1));
    }

    public function test_it_should_unset_the_value_at_the_given_offset(): void
    {
        $buffer = ByteBuffer::new('Hello World');
        $buffer->__unset(1);

        self::assertFalse($buffer->__isset(1));
    }

    public function test_it_should_initialise_from_array(): void
    {
        $buffer = ByteBuffer::new(\mb_str_split('Hello World'));

        self::assertInstanceOf(ByteBuffer::class, $buffer);
        self::assertSame(11, $buffer->internalSize());
    }

    public function test_it_should_initialise_from_integer(): void
    {
        $buffer = ByteBuffer::new(11);

        self::assertInstanceOf(ByteBuffer::class, $buffer);
        self::assertSame(11, $buffer->internalSize());
    }

    public function test_it_should_initialise_from_string(): void
    {
        $buffer = ByteBuffer::new('Hello World');

        self::assertInstanceOf(ByteBuffer::class, $buffer);
        self::assertSame(11, $buffer->internalSize());
    }

    public function test_it_should_throw_for_invalid_type(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $buffer = ByteBuffer::new(123.456);
    }

    public function test_it_should_allocate_the_given_number_of_bytes(): void
    {
        $buffer = ByteBuffer::allocate(11);

        self::assertInstanceOf(ByteBuffer::class, $buffer);
        self::assertSame(11, $buffer->internalSize());
    }

    public function test_it_should_fail_to_allocate_the_given_number_of_bytes(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        ByteBuffer::allocate(-1);
    }

    public function test_it_should_initialise_the_buffer(): void
    {
        $buffer = ByteBuffer::allocate(11);
        $buffer->initializeBuffer(11, 'Hello World');

        self::assertSame('Hello World', $buffer->toUTF8());
        self::assertSame(11, $buffer->internalSize());
    }

    public function test_it_should_pack_the_given_value(): void
    {
        $buffer = ByteBuffer::allocate(11);
        $buffer->pack('C', 255, 0);

        self::assertSame(255, \unpack('C', $buffer->offsetGet(0))[1]);
    }

    public function test_it_should_unpack_the_given_value(): void
    {
        $buffer = ByteBuffer::allocate(11);
        $buffer->pack('C', 255, 0);
        $buffer->position(0);

        self::assertSame(255, $buffer->unpack('C'));
    }

    public function test_it_should_get_the_value(): void
    {
        $buffer = ByteBuffer::allocate(11);
        $buffer->pack('C', 255, 0);

        self::assertSame(255, \unpack('C', $buffer->get(0))[1]);
    }

    public function test_it_should_concat_the_given_buffers(): void
    {
        $hello = ByteBuffer::new('Hello');
        $world = ByteBuffer::new('World');

        $buffer = ByteBuffer::concat($hello, $world);

        self::assertSame('HelloWorld', $buffer->toUTF8());
    }

    public function test_it_should_append_the_given_buffer(): void
    {
        $buffer = ByteBuffer::new('Hello');
        $buffer->append(ByteBuffer::new('World'));

        self::assertSame('HelloWorld', $buffer->toUTF8());
        self::assertSame($buffer->capacity(), $buffer->current()); // offset should be at the end of new buffer
    }

    public function test_it_should_append_the_given_string(): void
    {
        $buffer = ByteBuffer::new('Hello');
        $buffer->append('World');

        self::assertSame('HelloWorld', $buffer->toUTF8());
        self::assertSame($buffer->capacity(), $buffer->current()); // offset should be at the end of new buffer
    }

    public function test_it_should_append_the_given_buffer_to_another(): void
    {
        $buffer = ByteBuffer::new('Hello');

        ByteBuffer::new('World')->appendTo($buffer);

        self::assertSame('HelloWorld', $buffer->toUTF8());
        self::assertSame($buffer->capacity(), $buffer->current()); // offset should be at the end of new buffer
    }

    public function test_it_should_prepend_the_given_buffer(): void
    {
        $buffer = ByteBuffer::new('World');
        $buffer->prepend(ByteBuffer::new('Hello'));

        self::assertSame('HelloWorld', $buffer->toUTF8());
        self::assertSame($buffer->capacity(), $buffer->current()); // offset should be at the end of new buffer
    }

    public function test_it_should_prepend_the_given_string(): void
    {
        $buffer = ByteBuffer::new('World');
        $buffer->prepend('Hello');

        self::assertSame('HelloWorld', $buffer->toUTF8());
        self::assertSame($buffer->capacity(), $buffer->current()); // offset should be at the end of new buffer
    }

    public function test_it_should_prepend_the_given_buffer_to_another(): void
    {
        $buffer = ByteBuffer::new('World');

        ByteBuffer::new('Hello')->prependTo($buffer);

        self::assertSame('HelloWorld', $buffer->toUTF8());
        self::assertSame($buffer->capacity(), $buffer->current()); // offset should be at the end of new buffer
    }

    public function test_it_should_fill_the_buffer_with_the_given_number_of_bytes(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->fill(11);

        self::assertSame(11, $buffer->internalSize());
    }

    public function test_it_should_fill_the_buffer_starting_from_current_position(): void
    {
        $buffer = ByteBuffer::new('hello');
        $buffer->position(4);
        $buffer->fill(11);

        self::assertSame(4 + 11, $buffer->internalSize());
    }

    public function test_it_should_flip_the_buffer_contents(): void
    {
        $buffer = ByteBuffer::new('Hello World');
        $buffer->flip();

        self::assertSame(11, $buffer->internalSize());
        self::assertSame(0, $buffer->current());
        self::assertSame('dlroW olleH', $buffer->toUTF8());
    }

    public function test_it_should_set_the_byte_order(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->order(0);

        self::assertTrue($buffer->isBigEndian());
    }

    public function test_it_should_reverse_the_buffer_contents(): void
    {
        $buffer = ByteBuffer::new('Hello World');
        $buffer->reverse();

        self::assertSame('dlroW olleH', $buffer->toUTF8());
    }

    public function test_it_should_slice_the_buffer_contents(): void
    {
        $buffer = ByteBuffer::new('Hello World');

        self::assertSame(\mb_str_split('Hello'), $buffer->slice(0, 5));
    }

    public function test_it_should_fail_to_slice_the_buffer_contents_if_offset_is_to_big(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        ByteBuffer::new('Hello World')->slice(16, 5);
    }

    public function test_it_should_fail_to_slice_the_buffer_contents_if_length_is_to_big(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        ByteBuffer::new('Hello World')->slice(0, 16);
    }

    public function test_it_should_compare_if_the_buffers_are_equal(): void
    {
        $buffer1 = ByteBuffer::allocate(11);
        $buffer2 = ByteBuffer::allocate(11);

        self::assertTrue($buffer1->equals($buffer2));
    }

    public function test_it_should_test_if_the_given_value_is_a_byte_buffer(): void
    {
        $buffer = ByteBuffer::allocate(11);

        self::assertTrue($buffer->isByteBuffer($buffer));
    }

    public function test_it_should_test_if_the_buffer_is_big_endian(): void
    {
        $buffer = ByteBuffer::allocate(11);
        $buffer->order(0);

        self::assertTrue($buffer->isBigEndian());
    }

    public function test_it_should_test_if_the_buffer_is_little_endian(): void
    {
        $buffer = ByteBuffer::allocate(11);
        $buffer->order(1);

        self::assertTrue($buffer->isLittleEndian());
    }

    public function test_it_should_test_if_the_buffer_is_machine_byte(): void
    {
        $buffer = ByteBuffer::allocate(11);
        $buffer->order(2);

        self::assertTrue($buffer->isMachineByte());
    }
}
