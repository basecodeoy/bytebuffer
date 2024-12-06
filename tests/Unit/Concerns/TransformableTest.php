<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\ByteBuffer\ByteBuffer;

test('it should transform to binary', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World 😄');

    expect($byteBuffer->toBinary())->toBe('Hello World 😄');
});

test('it should transform to hex', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World 😄');

    expect($byteBuffer->toHex())->toBe('48656c6c6f20576f726c6420f09f9884');
});

test('it should transform to utf8', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World 😄');

    expect($byteBuffer->toUTF8())->toBe('Hello World 😄');
});

test('it should transform to base64', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World 😄');

    expect($byteBuffer->toBase64())->toBe('SGVsbG8gV29ybGQg8J+YhA==');
});

test('it should transform to array', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World 😄');

    expect($byteBuffer->toArray())->toBe(\mb_str_split('Hello World 😄'));
});

test('it should transform to gmp', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World 😄');

    expect($byteBuffer->toGmp())->toBeInstanceOf(GMP::class);
});

test('it should transform to gmp integer', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World 😄');

    expect($byteBuffer->toGmpInt())->toBe(8_245_075_110_447_257_732);
});

test('it should transform to gmp string', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World 😄');

    expect($byteBuffer->toGmpString())->toBe('96231036770496640978624582588703938692');
});

test('it should transform to string as binary', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World 😄');

    expect($byteBuffer->toString('binary'))->toBe('Hello World 😄');
});

test('it should transform to string as hex', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World 😄');

    expect($byteBuffer->toString('hex'))->toBe('48656c6c6f20576f726c6420f09f9884');
});

test('it should transform to string as utf8', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World 😄');

    expect($byteBuffer->toString('utf8'))->toBe('Hello World 😄');
});

test('it should transform to string as base64', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World 😄');

    expect($byteBuffer->toString('base64'))->toBe('SGVsbG8gV29ybGQg8J+YhA==');
});

test('it should throw for invalid type', function (): void {
    $this->expectException(InvalidArgumentException::class);

    ByteBuffer::new('Hello World 😄')->toString('_INVALID_');
});
