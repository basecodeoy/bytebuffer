<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\ByteBuffer;

const EXPECTED = '48656c6c6f20576f726c6420f09f9884';

test('it should initialise from binary', function (): void {
    $byteBuffer = ByteBuffer::fromBinary('Hello World 😄');

    expect($byteBuffer->toHex())->toBe(EXPECTED);
});

test('it should initialise from hex', function (): void {
    $byteBuffer = ByteBuffer::fromHex(EXPECTED);

    expect($byteBuffer->toHex())->toBe(EXPECTED);
});

test('it should fail to initialise from hex', function (): void {
    $this->expectException(InvalidArgumentException::class);

    ByteBuffer::fromHex('😄');
});

test('it should initialise from utf8', function (): void {
    $byteBuffer = ByteBuffer::fromUTF8('Hello World 😄');

    expect($byteBuffer->toHex())->toBe(EXPECTED);
});

test('it should initialise from base64', function (): void {
    $byteBuffer = ByteBuffer::fromBase64(\base64_encode('Hello World 😄'));

    expect($byteBuffer->toHex())->toBe(EXPECTED);
});

test('it should initialise from array', function (): void {
    $byteBuffer = ByteBuffer::fromArray(\mb_str_split('Hello World 😄'));

    expect($byteBuffer->toHex())->toBe(EXPECTED);
});

test('it should initialise from string as binary', function (): void {
    $byteBuffer = ByteBuffer::fromString('Hello World 😄', 'binary');

    expect($byteBuffer->toHex())->toBe(EXPECTED);
});

test('it should initialise from string as hex', function (): void {
    $byteBuffer = ByteBuffer::fromString(EXPECTED, 'hex');

    expect($byteBuffer->toHex())->toBe(EXPECTED);
});

test('it should initialise from string as utf8', function (): void {
    $byteBuffer = ByteBuffer::fromString('Hello World 😄', 'utf8');

    expect($byteBuffer->toHex())->toBe(EXPECTED);
});

test('it should initialise from string as base64', function (): void {
    $byteBuffer = ByteBuffer::fromString(\base64_encode('Hello World 😄'), 'base64');

    expect($byteBuffer->toHex())->toBe(EXPECTED);
});

test('it should throw for invalid type', function (): void {
    $this->expectException(InvalidArgumentException::class);

    ByteBuffer::fromString('Hello World 😄', '_INVALID_');
});
