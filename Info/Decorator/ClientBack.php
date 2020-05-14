<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

class ClientBack extends InfoDecorator
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * 付款完成或取號完成
     * @var string
     */
    protected $clientBackUrl;

    public function __construct(Info $info, string $clientBackUrl)
    {
        $this->info = $info;

        $this->clientBackUrl = $clientBackUrl;
    }

    public function getInfo()
    {
        return $this->info->getInfo() +
            [
                'ClientBackURL' => $this->clientBackUrl,
            ];
    }
}
