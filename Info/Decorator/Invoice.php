<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Contracts\InvoiceItemInterface;
use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

class Invoice extends InfoDecorator
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * @var InvoiceItemInterface[]
     */
    protected $items;

    public function __construct(Info $info, InvoiceItemInterface ... $items)
    {
        $this->info = $info;

        $this->items = $items;
    }

    public function getInfo()
    {
        // TODO: Implement getInfo() method.
    }
}