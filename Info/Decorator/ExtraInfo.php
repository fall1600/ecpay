<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;

class ExtraInfo extends Info
{
    /**
     * @var Info
     */
    protected $info;

    public function __construct(Info $info)
    {
        $this->info = $info;
    }

    /**
     * 是否需要額外的付款資訊
     * 注意事項: 額外回傳的參數全部都需要加入檢查碼計算
     *
     * @return array
     */
    public function getInfo()
    {
        return $this->info->getInfo() +
            [
                'NeedExtraPaidInfo' => 'Y'
            ];
    }
}
