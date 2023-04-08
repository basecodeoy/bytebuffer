<?php

declare(strict_types=1);

namespace PreemStudio\ByteBuffer\Concerns;

trait Writeable
{
    use Writes\Floats;
    use Writes\Hex;
    use Writes\Integer;
    use Writes\Strings;
    use Writes\UnsignedInteger;
}
