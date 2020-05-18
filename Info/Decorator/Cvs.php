<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Constants\Payment\CvsSubType;

class Cvs extends AbstractCvs
{
    /**
     * 繳費期限, 以分鐘為單位
     * @var int
     */
    protected $ttl;

    /**
     * @var string
     */
    protected $subPaymentType;

    protected function setTtl(int $ttl)
    {
        $this->ttl = $ttl;
    }

    protected function setSubPaymentType(string $subPaymentType = null)
    {
        if ($subPaymentType && ! CvsSubType::isValid($subPaymentType)) {
            throw new \LogicException('unsupported sub payment type of csv');
        }

        $this->subPaymentType = $subPaymentType;
    }
}
