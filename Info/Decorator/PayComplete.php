<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

class PayComplete extends InfoDecorator
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * 支付完成返回的商店網址
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
