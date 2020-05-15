<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

class MerchandisingUrl extends InfoDecorator
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * 商品銷售網址
     * @var string
     */
    protected $url;

    public function __construct(Info $info, string $url)
    {
        $this->info = $info;

        $this->url = $url;
    }

    public function getInfo()
    {
        return $this->info->getInfo() +
            [
                'ItemURL' => $this->url,
            ];
    }
}