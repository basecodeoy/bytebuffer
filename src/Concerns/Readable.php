<?php

declare(strict_types=1);

namespace BombenProdukt\ByteBuffer\Concerns;

trait Readable
{
    use Reads\Floats;
    use Reads\Hex;
    use Reads\Integer;
    use Reads\Strings;
    use Reads\UnsignedInteger;
}
