<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\ByteBuffer;

test('it should write bytes', function (): void {
    $byteBuffer = ByteBuffer::new(0);
    $byteBuffer->writeBytes('Hello World');

    expect($byteBuffer->internalSize())->toBe(11);
});

test('it should write string', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeString('Hello World');

    expect($byteBuffer->internalSize())->toBe(11);
});

test('it should write utf8 string', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUTF8String('Hello World 😄');

    expect($byteBuffer->internalSize())->toBe(20);
});

test('it should write c string', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeCString('Hello World');

    expect($byteBuffer->internalSize())->toBe(12);
    expect($byteBuffer->toHex())->toBe('48656c6c6f20576f726c6400');
});

test('it should write i string', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeIString('Hello World');

    expect($byteBuffer->internalSize())->toBe(15);
    expect($byteBuffer->toHex())->toBe('0000000b48656c6c6f20576f726c64');
});

test('it should write v string', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeVString('Hello World');

    expect($byteBuffer->internalSize())->toBe(12);
    expect($byteBuffer->toHex())->toBe('0b48656c6c6f20576f726c64');
});
