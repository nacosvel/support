<?php

namespace Nacosvel\Support\Heap;

class HeapMin extends Heap
{
    protected function compare(mixed $value1, mixed $value2): int
    {
        return $value1 <=> $value2;
    }
}
