<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;

class PayComplete extends Info
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * 付款完成回到你系統的位置
     * @var string
     */
    protected $orderResultUrl;

    public function __construct(Info $info, string $orderResultUrl)
    {
        $this->info = $info;

        $this->orderResultUrl = $orderResultUrl;
    }

    public function getInfo()
    {
        return $this->info->getInfo() +
            [
                'OrderResultURL' => $this->orderResultUrl,
            ];
    }
}
