<?php

namespace App\DataStructures;

class Stack
{
    protected array $stack = [];

    public function push($item): void
    {
        $this->stack[] = $item;
    }

    public function pop()
    {
        return array_pop($this->stack);
    }

    public function peek()
    {
        return end($this->stack);
    }

    public function isEmpty(): bool
    {
        return empty($this->stack);
    }

    public function all(): array
    {
        return $this->stack;
    }
}

