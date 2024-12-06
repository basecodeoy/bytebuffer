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

    expect($byteBuffer->__get(1))->toBe('e');
});

test('it should set the value at the given offset', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');
    $byteBuffer->__set(1, 'X');

    expect($byteBuffer->__get(1))->toBe('X');
});

test('it should check if the offset exists', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');

    expect($byteBuffer->__isset(1))->toBeTrue();
});

test('it should unset the value at the given offset', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');
    $byteBuffer->__unset(1);

    expect($byteBuffer->__isset(1))->toBeFalse();
});

test('it should initialise from array', function (): void {
    $byteBuffer = ByteBuffer::new(\mb_str_split('Hello World'));

    expect($byteBuffer)->toBeInstanceOf(ByteBuffer::class);
    expect($byteBuffer->internalSize())->toBe(11);
});

test('it should initialise from integer', function (): void {
    $byteBuffer = ByteBuffer::new(11);

    expect($byteBuffer)->toBeInstanceOf(ByteBuffer::class);
    expect($byteBuffer->internalSize())->toBe(11);
});

test('it should initialise from string', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');

    expect($byteBuffer)->toBeInstanceOf(ByteBuffer::class);
    expect($byteBuffer->internalSize())->toBe(11);
});

test('it should throw for invalid type', function (): void {
    $this->expectException(InvalidArgumentException::class);

    ByteBuffer::new(123.456);
});

test('it should allocate the given number of bytes', function (): void {
    $byteBuffer = ByteBuffer::allocate(11);

    expect($byteBuffer)->toBeInstanceOf(ByteBuffer::class);
    expect($byteBuffer->internalSize())->toBe(11);
});

test('it should fail to allocate the given number of bytes', function (): void {
    $this->expectException(InvalidArgumentException::class);

    ByteBuffer::allocate(-1);
});

test('it should initialise the buffer', function (): void {
    $byteBuffer = ByteBuffer::allocate(11);
    $byteBuffer->initializeBuffer(11, 'Hello World');

    expect($byteBuffer->toUTF8())->toBe('Hello World');
    expect($byteBuffer->internalSize())->toBe(11);
});

test('it should pack the given value', function (): void {
    $byteBuffer = ByteBuffer::allocate(11);
    $byteBuffer->pack('C', 255, 0);

    expect(\unpack('C', (string) $byteBuffer->offsetGet(0))[1])->toBe(255);
});

test('it should unpack the given value', function (): void {
    $byteBuffer = ByteBuffer::allocate(11);
    $byteBuffer->pack('C', 255, 0);
    $byteBuffer->position(0);

    expect($byteBuffer->unpack('C'))->toBe(255);
});

test('it should get the value', function (): void {
    $byteBuffer = ByteBuffer::allocate(11);
    $byteBuffer->pack('C', 255, 0);

    expect(\unpack('C', (string) $byteBuffer->get(0))[1])->toBe(255);
});

test('it should concat the given buffers', function (): void {
    $byteBuffer = ByteBuffer::new('Hello');
    $world = ByteBuffer::new('World');

    $buffer = ByteBuffer::concat($byteBuffer, $world);

    expect($buffer->toUTF8())->toBe('HelloWorld');
});

test('it should append the given buffer', function (): void {
    $byteBuffer = ByteBuffer::new('Hello');
    $byteBuffer->append(ByteBuffer::new('World'));

    expect($byteBuffer->toUTF8())->toBe('HelloWorld');
    expect($byteBuffer->current())->toBe($byteBuffer->capacity());
    // offset should be at the end of new buffer
});

test('it should append the given string', function (): void {
    $byteBuffer = ByteBuffer::new('Hello');
    $byteBuffer->append('World');

    expect($byteBuffer->toUTF8())->toBe('HelloWorld');
    expect($byteBuffer->current())->toBe($byteBuffer->capacity());
    // offset should be at the end of new buffer
});

test('it should append the given buffer to another', function (): void {
    $byteBuffer = ByteBuffer::new('Hello');

    ByteBuffer::new('World')->appendTo($byteBuffer);

    expect($byteBuffer->toUTF8())->toBe('HelloWorld');
    expect($byteBuffer->current())->toBe($byteBuffer->capacity());
    // offset should be at the end of new buffer
});

test('it should prepend the given buffer', function (): void {
    $byteBuffer = ByteBuffer::new('World');
    $byteBuffer->prepend(ByteBuffer::new('Hello'));

    expect($byteBuffer->toUTF8())->toBe('HelloWorld');
    expect($byteBuffer->current())->toBe($byteBuffer->capacity());
    // offset should be at the end of new buffer
});

test('it should prepend the given string', function (): void {
    $byteBuffer = ByteBuffer::new('World');
    $byteBuffer->prepend('Hello');

    expect($byteBuffer->toUTF8())->toBe('HelloWorld');
    expect($byteBuffer->current())->toBe($byteBuffer->capacity());
    // offset should be at the end of new buffer
});

test('it should prepend the given buffer to another', function (): void {
    $byteBuffer = ByteBuffer::new('World');

    ByteBuffer::new('Hello')->prependTo($byteBuffer);

    expect($byteBuffer->toUTF8())->toBe('HelloWorld');
    expect($byteBuffer->current())->toBe($byteBuffer->capacity());
    // offset should be at the end of new buffer
});

test('it should fill the buffer with the given number of bytes', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->fill(11);

    expect($byteBuffer->internalSize())->toBe(11);
});

test('it should fill the buffer starting from current position', function (): void {
    $byteBuffer = ByteBuffer::new('hello');
    $byteBuffer->position(4);
    $byteBuffer->fill(11);

    expect($byteBuffer->internalSize())->toBe(4 + 11);
});

test('it should flip the buffer contents', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');
    $byteBuffer->flip();

    expect($byteBuffer->internalSize())->toBe(11);
    expect($byteBuffer->current())->toBe(0);
    expect($byteBuffer->toUTF8())->toBe('dlroW olleH');
});

test('it should set the byte order', function (): void {
    $byteBuffer = ByteBuffer::new(1);
    $byteBuffer->order(0);

    expect($byteBuffer->isBigEndian())->toBeTrue();
});

test('it should reverse the buffer contents', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');
    $byteBuffer->reverse();

    expect($byteBuffer->toUTF8())->toBe('dlroW olleH');
});

test('it should slice the buffer contents', function (): void {
    $byteBuffer = ByteBuffer::new('Hello World');

    expect($byteBuffer->slice(0, 5))->toBe(\mb_str_split('Hello'));
});

test('it should fail to slice the buffer contents if offset is to big', function (): void {
    $this->expectException(InvalidArgumentException::class);

    ByteBuffer::new('Hello World')->slice(16, 5);
});

test('it should fail to slice the buffer contents if length is to big', function (): void {
    $this->expectException(InvalidArgumentException::class);

    ByteBuffer::new('Hello World')->slice(0, 16);
});

test('it should compare if the buffers are equal', function (): void {
    $byteBuffer = ByteBuffer::allocate(11);
    $buffer2 = ByteBuffer::allocate(11);

    expect($byteBuffer->equals($buffer2))->toBeTrue();
});

test('it should test if the given value is a byte buffer', function (): void {
    $byteBuffer = ByteBuffer::allocate(11);

    expect($byteBuffer->isByteBuffer($byteBuffer))->toBeTrue();
});

test('it should test if the buffer is big endian', function (): void {
    $byteBuffer = ByteBuffer::allocate(11);
    $byteBuffer->order(0);

    expect($byteBuffer->isBigEndian())->toBeTrue();
});

test('it should test if the buffer is little endian', function (): void {
    $byteBuffer = ByteBuffer::allocate(11);
    $byteBuffer->order(1);

    expect($byteBuffer->isLittleEndian())->toBeTrue();
});

test('it should test if the buffer is machine byte', function (): void {
    $byteBuffer = ByteBuffer::allocate(11);
    $byteBuffer->order(2);

    expect($byteBuffer->isMachineByte())->toBeTrue();
});
