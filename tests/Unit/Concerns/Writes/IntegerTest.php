<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\ByteBuffer;

test('it should write int8', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeInt8(8);

    expect($byteBuffer->internalSize())->toBe(1);
});

test('it should write int16', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeInt16(16);

    expect($byteBuffer->internalSize())->toBe(2);
});

test('it should write int32', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeInt32(32);

    expect($byteBuffer->internalSize())->toBe(4);
});

test('it should write int64', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeInt64(64);

    expect($byteBuffer->internalSize())->toBe(8);
});

test('it should write byte', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeByte(8);

    expect($byteBuffer->internalSize())->toBe(1);
});

test('it should write short', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeShort(16);

    expect($byteBuffer->internalSize())->toBe(2);
});

test('it should write int', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeInt(32);

    expect($byteBuffer->internalSize())->toBe(4);
});

test('it should write long', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeLong(64);

    expect($byteBuffer->internalSize())->toBe(8);
});
