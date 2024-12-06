<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\ByteBuffer;

test('it should current the offset', function (): void {
    $byteBuffer = ByteBuffer::new(8);
    $byteBuffer->current();

    expect($byteBuffer->current())->toBe(0);
});

test('it should set the offset to the given value', function (): void {
    $byteBuffer = ByteBuffer::new(8);
    $byteBuffer->position(5);

    expect($byteBuffer->current())->toBe(5);
});

test('it should skip the given number of bytes', function (): void {
    $byteBuffer = ByteBuffer::new(8);
    $byteBuffer->skip(2);
    $byteBuffer->skip(3);
    $byteBuffer->skip(1);

    expect($byteBuffer->current())->toBe(6);
});

test('it should rewind the given number of bytes', function (): void {
    $byteBuffer = ByteBuffer::new(8);
    $byteBuffer->position(5);
    $byteBuffer->rewind(3);
    $byteBuffer->rewind(1);

    expect($byteBuffer->current())->toBe(1);
});

test('it should reset the offset', function (): void {
    $byteBuffer = ByteBuffer::new(8);
    $byteBuffer->position(5);

    expect($byteBuffer->current())->toBe(5);

    $byteBuffer->reset();
    expect($byteBuffer->current())->toBe(0);
});

test('it should clear the offset', function (): void {
    $byteBuffer = ByteBuffer::new(8);
    $byteBuffer->position(5);

    expect($byteBuffer->current())->toBe(5);
    expect($byteBuffer->capacity())->toBe(8);

    $byteBuffer->clear();
    expect($byteBuffer->current())->toBe(0);
    expect($byteBuffer->capacity())->toBe(8);
});
