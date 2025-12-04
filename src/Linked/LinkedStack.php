<?php

namespace Nacosvel\Support\Linked;

class LinkedStack extends LinkedList
{
    public function __construct(private array $items = [])
    {
        parent::__construct($this->items);
        $this->setIteratorMode(self::IT_MODE_LIFO);
    }
}
