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
final class StringsTest extends TestCase
{
    public function test_it_should_read_string(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeString('Hello World');
        $buffer->position(0);

        self::assertSame('Hello World', $buffer->readString(11));
    }

    public function test_it_should_read_utf8_string(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeUTF8String('Hello World 😄');
        $buffer->position(0);

        self::assertSame('Hello World 😄', $buffer->readUTF8String(20));
    }

    public function test_it_should_read_c_string(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeCString('Hello World ');
        $buffer->position(0);

        self::assertSame('Hello World', $buffer->readCString(11));
    }

    public function test_it_should_read_i_string(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeIString('Hello World');
        $buffer->position(0);

        self::assertSame('Hello World', $buffer->readIString(11));
    }

    public function test_it_should_write_v_string(): void
    {
        $buffer = ByteBuffer::new(1);
        $buffer->writeVString('Hello World');
        $buffer->position(0);

        self::assertSame('Hello World', $buffer->readVString(11));
    }
}
