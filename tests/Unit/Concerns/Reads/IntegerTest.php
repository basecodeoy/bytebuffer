<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\ByteBuffer;

test('it should read int8', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeInt8(8);
    $byteBuffer->position(0);

    expect($byteBuffer->readInt8())->toBe(8);
});

test('it should read int16', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeInt16(16);
    $byteBuffer->position(0);

    expect($byteBuffer->readInt16())->toBe(16);
});

test('it should read int32', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeInt32(32);
    $byteBuffer->position(0);

    expect($byteBuffer->readInt32())->toBe(32);
});

test('it should read int64', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeInt64(64);
    $byteBuffer->position(0);

    expect($byteBuffer->readInt64())->toBe(64);
});

test('it should read byte', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeByte(8);
    $byteBuffer->position(0);

    expect($byteBuffer->readByte())->toBe(8);
});

test('it should read short', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeShort(16);
    $byteBuffer->position(0);

    expect($byteBuffer->readShort())->toBe(16);
});

test('it should read int', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeInt(32);
    $byteBuffer->position(0);

    expect($byteBuffer->readInt())->toBe(32);
});

test('it should read long', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeLong(64);
    $byteBuffer->position(0);

    expect($byteBuffer->readLong())->toBe(64);
});
