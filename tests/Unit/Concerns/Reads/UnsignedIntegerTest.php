<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\ByteBuffer;

test('it should read uint8', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUInt8(8);
    $byteBuffer->position(0);

    expect($byteBuffer->readUInt8())->toBe(8);
});

test('it should read uint16', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUInt16(16);
    $byteBuffer->position(0);

    expect($byteBuffer->readUInt16())->toBe(16);
});

test('it should read uint32', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUInt32(32);
    $byteBuffer->position(0);

    expect($byteBuffer->readUInt32())->toBe(32);
});

test('it should read uint64', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUInt64(64);
    $byteBuffer->position(0);

    expect($byteBuffer->readUInt64())->toBe(64);
});

test('it should read ubyte', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUByte(8);
    $byteBuffer->position(0);

    expect($byteBuffer->readUByte())->toBe(8);
});

test('it should read ushort', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUShort(15);
    $byteBuffer->position(0);

    expect($byteBuffer->readUShort())->toBe(15);
});

test('it should read uint', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUInt(32);
    $byteBuffer->position(0);

    expect($byteBuffer->readUInt())->toBe(32);
});

test('it should read ulong', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeULong(64);
    $byteBuffer->position(0);

    expect($byteBuffer->readULong())->toBe(64);
});
