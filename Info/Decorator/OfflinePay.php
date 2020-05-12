<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

class OfflinePay extends InfoDecorator
{
    /** @var Info */
    protected $info;

    public function __construct(Info $info)
    {
        $this->info = $info;
    }

    public function getInfo()
    {
        // TODO: Implement getInfo() method.
    }
}
