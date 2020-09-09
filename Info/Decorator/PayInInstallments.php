<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;

class PayInInstallments extends Info
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
