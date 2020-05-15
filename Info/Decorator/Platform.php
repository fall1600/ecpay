<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

class Platform extends InfoDecorator
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * @var string
     */
    protected $platformId;

    public function __construct(Info $info, string $platformId)
    {
        $this->info = $info;

        $this->platformId = $platformId;
    }

    /**
     * 特約合作平台商代號(由綠界提供)
     * @return array
     */
    public function getInfo()
    {
        return $this->info->getInfo() +
            [
                'PlatformID' => $this->platformId,
            ];
    }
}
