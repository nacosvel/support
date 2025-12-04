<?php

namespace Nacosvel\Support\Linked;

class LinkedQueue extends LinkedList
{
    public function __construct(private array $items = [])
    {
        parent::__construct($this->items);
        $this->setIteratorMode(self::IT_MODE_FIFO);
    }

    /**
     * Dequeues a node from the queue
     *
     * @link https://php.net/manual/en/splqueue.dequeue.php
     * @return mixed
     */
    #[TentativeType]
    public function dequeue(): mixed
    {
        return $this->shift();
    }

    /**
     * Adds an element to the queue.
     *
     * @link https://php.net/manual/en/splqueue.enqueue.php
     *
     * @param mixed $value
     *
     * @return void
     */
    #[TentativeType]
    public function enqueue(mixed $value): void
    {
        $this->push($value);
    }
}
