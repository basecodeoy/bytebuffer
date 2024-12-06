<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\ByteBuffer;

test('it should read string', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeString('Hello World');
    $byteBuffer->position(0);

    expect($byteBuffer->readString(11))->toBe('Hello World');
});

test('it should read utf8 string', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUTF8String('Hello World 😄');
    $byteBuffer->position(0);

    expect($byteBuffer->readUTF8String(20))->toBe('Hello World 😄');
});

test('it should read c string', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeCString('Hello World ');
    $byteBuffer->position(0);

    expect($byteBuffer->readCString(11))->toBe('Hello World');
});

test('it should read i string', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeIString('Hello World');
    $byteBuffer->position(0);

    expect($byteBuffer->readIString(11))->toBe('Hello World');
});

test('it should write v string', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeVString('Hello World');
    $byteBuffer->position(0);

    expect($byteBuffer->readVString(11))->toBe('Hello World');
});
