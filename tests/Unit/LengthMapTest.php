<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\LengthMap;

test('it should get the length for string', function (): void {
    expect(LengthMap::get('a33'))->toBe(33);
});

test('it should get the length for float', function (): void {
    expect(LengthMap::get('f33'))->toBe(33);
});

test('it should get the length for double', function (): void {
    expect(LengthMap::get('d33'))->toBe(33);
});

test('it should get the length for hex with low nibble', function (): void {
    expect(LengthMap::get('h66'))->toBe(33);
});

test('it should get the length for hex with high nibble', function (): void {
    expect(LengthMap::get('H66'))->toBe(33);
});

test('it should get the length from the array', function (): void {
    expect(LengthMap::get('C'))->toBe(1);
});

test('it should throw for invalid type', function (): void {
    $this->expectException(InvalidArgumentException::class);

    LengthMap::get('_INVALID_');
});
