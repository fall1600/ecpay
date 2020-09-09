<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;

class ClientBack extends Info
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * 任何時候在綠界想返回你系統的位置
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
