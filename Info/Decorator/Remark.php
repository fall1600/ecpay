<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;

class Remark extends Info
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * 備註欄位
     * @var string
     */
    protected $remark;

    public function __construct(Info $info, string $remark)
    {
        $this->info = $info;

        $this->remark = $remark;
    }

    public function getInfo()
    {
        return $this->info->getInfo() +
            [
                'Remark' => $this->remark,
            ];
    }
}
