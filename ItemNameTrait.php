<?php

namespace fall1600\Package\Ecpay;

trait ItemNameTrait
{
    /** @var array */
    protected $items;

    public function setItemNames(array $items)
    {
        $this->items = $items;
    }

    /** @return string */
    public function getItemName()
    {
        if (! $this->items) {
            throw new \LogicException('empty items');
        }

        return mb_substr(implode('#', $this->items), 0, 400);
    }
}
