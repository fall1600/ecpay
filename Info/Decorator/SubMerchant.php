<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

class SubMerchant extends InfoDecorator
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * 特店旗下店舖代號
     *   提供特店填入分店代號使用, 僅可用英數字大小寫混合
     * @var string
     */
    protected $subMerchantId;

    public function __construct(Info $info, string $subMerchantId)
    {
        $this->info = $info;

        $this->subMerchantId = $subMerchantId;
    }

    public function getInfo()
    {
        return $this->info->getInfo() +
            [
                'StoreID' => $this->subMerchantId,
            ];
    }
}
