<?php

declare(strict_types=1);

namespace PreemStudio\ByteBuffer\Concerns;

trait Readable
{
    use Reads\Floats,
        Reads\Hex,
        Reads\Integer,
        Reads\Strings,
        Reads\UnsignedInteger;
}
