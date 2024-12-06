<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\ByteBuffer;

test('it should return the capacity', function (): void {
    $byteBuffer = ByteBuffer::new(8);

    expect($byteBuffer->capacity())->toBe(8);
});

test('it should return the internal capacity', function (): void {
    $byteBuffer = ByteBuffer::new(8);

    expect($byteBuffer->internalSize())->toBe(8);
});

test('it should ensure the given capacity', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');
    $byteBuffer->ensureCapacity(32);

    expect($byteBuffer->capacity())->toBe(32);
});

test('it should keep the given capacity', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');

    expect($byteBuffer->ensureCapacity(5))->toBeInstanceOf(ByteBuffer::class);
    expect($byteBuffer->capacity())->toBe(11);
});

test('it should resize the buffer', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');
    $byteBuffer->resize(32);

    expect($byteBuffer->capacity())->toBe(32);
});

test('it should return the remaining bytes', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');
    $byteBuffer->remaining();

    expect($byteBuffer->remaining())->toBe(11);
});
