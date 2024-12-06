<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\ByteBuffer;

test('it should write float32', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeFloat32(8.0);

    expect($byteBuffer->internalSize())->toBe(4);
});

test('it should write float64', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeFloat64(8.0);

    expect($byteBuffer->internalSize())->toBe(8);
});

test('it should write double', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeDouble(8.0);

    expect($byteBuffer->internalSize())->toBe(8);
});
