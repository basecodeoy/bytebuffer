<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\ByteBuffer;

test('it should get the value at the given offset', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');

    expect($byteBuffer->offsetGet(1))->toBe('e');
});

test('it should set the value at the given offset', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');
    $byteBuffer->offsetSet(1, 'X');

    expect($byteBuffer->offsetGet(1))->toBe('X');
});

test('it should check if the offset exists', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');

    expect($byteBuffer->offsetExists(1))->toBeTrue();
});

test('it should unset the value at the given offset', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');
    $byteBuffer->offsetUnset(1);

    expect($byteBuffer->offsetExists(1))->toBeFalse();
});
