<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Constants\Payment\BarcodeSubType;

class Barcode extends AbstractCvs
{
    /**
     * 繳費期限, 以天為單位
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
        if ($subPaymentType && ! BarcodeSubType::isValid($subPaymentType)) {
            throw new \LogicException('unsupported sub payment type of csv barcode');
        }

        $this->subPaymentType = $subPaymentType;
    }
}
