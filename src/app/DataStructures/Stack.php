<?php

namespace App\DataStructures;

class Stack
{
    protected array $items = [];

    public function push($item)
    {
        $this->items[] = $item;
    }

    public function pop()
    {
        return array_pop($this->items);
    }

    public function all()
    {
        return $this->items;
    }
}
