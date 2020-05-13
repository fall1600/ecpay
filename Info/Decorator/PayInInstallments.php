<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

class PayInInstallments extends InfoDecorator
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * @var string
     */
    protected $instFlag;

    public function __construct(Info $info, string $instFlag)
    {
        $this->info = $info;

        $this->instFlag = $instFlag;
    }

    public function getInfo()
    {
        return $this->info->getInfo() +
            [
                'CreditInstallment' => $this->instFlag,
            ];
    }
}
