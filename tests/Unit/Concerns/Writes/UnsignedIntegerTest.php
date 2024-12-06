<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\ByteBuffer;

test('it should write uint8', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUInt8(8);

    expect($byteBuffer->internalSize())->toBe(1);
});

test('it should write uint16', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUInt16(16);

    expect($byteBuffer->internalSize())->toBe(2);
});

test('it should write uint32', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUInt32(32);

    expect($byteBuffer->internalSize())->toBe(4);
});

test('it should write uint64', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUInt64(64);

    expect($byteBuffer->internalSize())->toBe(8);
});

test('it should write ubyte', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUByte(8);

    expect($byteBuffer->internalSize())->toBe(1);
});

test('it should write ushort', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUShort(15);

    expect($byteBuffer->internalSize())->toBe(2);
});

test('it should write uint', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeUInt(32);

    expect($byteBuffer->internalSize())->toBe(4);
});

test('it should write ulong', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeULong(64);

    expect($byteBuffer->internalSize())->toBe(8);
});
