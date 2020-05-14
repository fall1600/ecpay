<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

class IgnorePayment extends InfoDecorator
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * @var string[]
     */
    protected $ignores;

    public function __construct(Info $info, string ... $ignores)
    {
        $this->info = $info;

        $this->ignores = $ignores;
    }

    public function getInfo()
    {
        return $this->info->getInfo() +
            [
                'IgnorePayment' => implode('#', $this->ignores),
            ];
    }
}
