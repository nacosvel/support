<?php

namespace Nacosvel\Support\Heap;

class HeapMax extends Heap
{
    protected function compare(mixed $value1, mixed $value2): int
    {
        return $value2 <=> $value1;
    }
}
