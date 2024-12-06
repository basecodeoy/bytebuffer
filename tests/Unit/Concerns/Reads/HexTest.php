<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\ByteBuffer;

test('it should read hex', function (): void {
    $byteBuffer = ByteBuffer::new(0);
    $byteBuffer->writeHex('48656c6c6f20576f726c64');
    $byteBuffer->position(0);

    expect($byteBuffer->internalSize())->toBe(11);
    expect($byteBuffer->readHex(22))->toBe('48656c6c6f20576f726c64');
});

test('it should read hex as string', function (): void {
    $byteBuffer = ByteBuffer::new(0);
    $byteBuffer->writeHex('48656c6c6f20576f726c64');
    $byteBuffer->position(0);

    expect($byteBuffer->internalSize())->toBe(11);
    expect($byteBuffer->readHexString(22))->toBe('Hello World');
});
