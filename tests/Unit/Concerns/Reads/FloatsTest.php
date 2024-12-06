<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\ByteBuffer;

test('it should read float32', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeFloat32(8.0);
    $byteBuffer->position(0);

    expect($byteBuffer->readFloat32())->toEqualWithDelta(8.0, \PHP_FLOAT_EPSILON);
});

test('it should read float64', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeFloat64(8.0);
    $byteBuffer->position(0);

    expect($byteBuffer->readFloat64())->toEqualWithDelta(8.0, \PHP_FLOAT_EPSILON);
});

test('it should read double', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->writeDouble(8.0);
    $byteBuffer->position(0);

    expect($byteBuffer->readDouble())->toEqualWithDelta(8.0, \PHP_FLOAT_EPSILON);
});
