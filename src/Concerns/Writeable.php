<?php

declare(strict_types=1);

namespace PreemStudio\ByteBuffer\Concerns;

trait Writeable
{
    use Writes\Floats,
        Writes\Hex,
        Writes\Integer,
        Writes\Strings,
        Writes\UnsignedInteger;
}
