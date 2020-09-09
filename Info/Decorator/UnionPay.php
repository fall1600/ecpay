<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Constants\UnionPayType;
use fall1600\Package\Ecpay\Info\Info;

class UnionPay extends Info
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * @var int
     */
    protected $unionPayType;

    public function __construct(Info $info, int $unionPayType = 0)
    {
        $this->info = $info;

        $this->setUnionPayType($unionPayType);
    }

    public function getInfo()
    {
        return $this->info->getInfo() +
            [
                'UnionPay' => $this->unionPayType,
            ];
    }

    protected function setUnionPayType(int $unionPayType)
    {
        if (! UnionPayType::isValid($unionPayType)) {
            throw new \LogicException('unsupported this type of unionpay');
        }

        $this->unionPayType = $unionPayType;
    }
}
