<?php

declare(strict_types=1);

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use BombenProdukt\ByteBuffer\LengthMap;

/**
 * @internal
 *
 * @coversNothing
 */
final class LengthMapTest extends TestCase
{
    public function test_it_should_get_the_length_for_string(): void
    {
        self::assertSame(33, LengthMap::get('a33'));
    }

    public function test_it_should_get_the_length_for_float(): void
    {
        self::assertSame(33, LengthMap::get('f33'));
    }

    public function test_it_should_get_the_length_for_double(): void
    {
        self::assertSame(33, LengthMap::get('d33'));
    }

    public function test_it_should_get_the_length_for_hex_with_low_nibble(): void
    {
        self::assertSame(33, LengthMap::get('h66'));
    }

    public function test_it_should_get_the_length_for_hex_with_high_nibble(): void
    {
        self::assertSame(33, LengthMap::get('H66'));
    }

    public function test_it_should_get_the_length_from_the_array(): void
    {
        self::assertSame(1, LengthMap::get('C'));
    }

    public function test_it_should_throw_for_invalid_type(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        LengthMap::get('_INVALID_');
    }
}
