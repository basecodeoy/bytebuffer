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
final class TransformableTest extends TestCase
{
    public function test_it_should_transform_to_binary(): void
    {
        $buffer = ByteBuffer::new('Hello World 😄');

        self::assertSame('Hello World 😄', $buffer->toBinary());
    }

    public function test_it_should_transform_to_hex(): void
    {
        $buffer = ByteBuffer::new('Hello World 😄');

        self::assertSame('48656c6c6f20576f726c6420f09f9884', $buffer->toHex());
    }

    public function test_it_should_transform_to_utf8(): void
    {
        $buffer = ByteBuffer::new('Hello World 😄');

        self::assertSame('Hello World 😄', $buffer->toUTF8());
    }

    public function test_it_should_transform_to_base64(): void
    {
        $buffer = ByteBuffer::new('Hello World 😄');

        self::assertSame('SGVsbG8gV29ybGQg8J+YhA==', $buffer->toBase64());
    }

    public function test_it_should_transform_to_array(): void
    {
        $buffer = ByteBuffer::new('Hello World 😄');

        self::assertSame(\mb_str_split('Hello World 😄'), $buffer->toArray());
    }

    public function test_it_should_transform_to_gmp(): void
    {
        $buffer = ByteBuffer::new('Hello World 😄');

        self::assertInstanceOf(\GMP::class, $buffer->toGmp());
    }

    public function test_it_should_transform_to_gmp_integer(): void
    {
        $buffer = ByteBuffer::new('Hello World 😄');

        self::assertSame(8245075110447257732, $buffer->toGmpInt());
    }

    public function test_it_should_transform_to_gmp_string(): void
    {
        $buffer = ByteBuffer::new('Hello World 😄');

        self::assertSame('96231036770496640978624582588703938692', $buffer->toGmpString());
    }

    public function test_it_should_transform_to_string_as_binary(): void
    {
        $buffer = ByteBuffer::new('Hello World 😄');

        self::assertSame('Hello World 😄', $buffer->toString('binary'));
    }

    public function test_it_should_transform_to_string_as_hex(): void
    {
        $buffer = ByteBuffer::new('Hello World 😄');

        self::assertSame('48656c6c6f20576f726c6420f09f9884', $buffer->toString('hex'));
    }

    public function test_it_should_transform_to_string_as_utf8(): void
    {
        $buffer = ByteBuffer::new('Hello World 😄');

        self::assertSame('Hello World 😄', $buffer->toString('utf8'));
    }

    public function test_it_should_transform_to_string_as_base64(): void
    {
        $buffer = ByteBuffer::new('Hello World 😄');

        self::assertSame('SGVsbG8gV29ybGQg8J+YhA==', $buffer->toString('base64'));
    }

    public function test_it_should_throw_for_invalid_type(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        ByteBuffer::new('Hello World 😄')->toString('_INVALID_');
    }
}
