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
final class InitialisableTest extends TestCase
{
    private $expected = '48656c6c6f20576f726c6420f09f9884';

    public function test_it_should_initialise_from_binary(): void
    {
        $buffer = ByteBuffer::fromBinary('Hello World 😄');

        self::assertSame($this->expected, $buffer->toHex());
    }

    public function test_it_should_initialise_from_hex(): void
    {
        $buffer = ByteBuffer::fromHex('48656c6c6f20576f726c6420f09f9884');

        self::assertSame($this->expected, $buffer->toHex());
    }

    public function test_it_should_fail_to_initialise_from_hex(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        ByteBuffer::fromHex('😄');
    }

    public function test_it_should_initialise_from_utf8(): void
    {
        $buffer = ByteBuffer::fromUTF8('Hello World 😄');

        self::assertSame($this->expected, $buffer->toHex());
    }

    public function test_it_should_initialise_from_base64(): void
    {
        $buffer = ByteBuffer::fromBase64(\base64_encode('Hello World 😄'));

        self::assertSame($this->expected, $buffer->toHex());
    }

    public function test_it_should_initialise_from_array(): void
    {
        $buffer = ByteBuffer::fromArray(\mb_str_split('Hello World 😄'));

        self::assertSame($this->expected, $buffer->toHex());
    }

    public function test_it_should_initialise_from_string_as_binary(): void
    {
        $buffer = ByteBuffer::fromString('Hello World 😄', 'binary');

        self::assertSame($this->expected, $buffer->toHex());
    }

    public function test_it_should_initialise_from_string_as_hex(): void
    {
        $buffer = ByteBuffer::fromString('48656c6c6f20576f726c6420f09f9884', 'hex');

        self::assertSame($this->expected, $buffer->toHex());
    }

    public function test_it_should_initialise_from_string_as_utf8(): void
    {
        $buffer = ByteBuffer::fromString('Hello World 😄', 'utf8');

        self::assertSame($this->expected, $buffer->toHex());
    }

    public function test_it_should_initialise_from_string_as_base64(): void
    {
        $buffer = ByteBuffer::fromString(\base64_encode('Hello World 😄'), 'base64');

        self::assertSame($this->expected, $buffer->toHex());
    }

    public function test_it_should_throw_for_invalid_type(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        ByteBuffer::fromString('Hello World 😄', '_INVALID_');
    }
}
