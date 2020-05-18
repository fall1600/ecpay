<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Constants\PaymentType;
use fall1600\Package\Ecpay\Constants\Payment\AtmSubType;
use fall1600\Package\Ecpay\Info\Info;

class Atm extends AbstractOfflinePay
{
    /**
     * 繳費天數
     *   綠界支援1~60天, 預設3天
     * @var int
     */
    protected $ttl;

    /**
     * @var string|null
     */
    protected $subPaymentType;

    public function __construct(Info $info, string $paymentInfoUrl, string $clientRedirectUrl = null, int $ttl = null, string $subPaymentType = null)
    {
        parent::__construct($info, $paymentInfoUrl, $clientRedirectUrl, $ttl);

        $this->setSubPaymentType($subPaymentType);
    }

    public function getInfo()
    {
        $result = $this->info->getInfo() +
            [
                'ChoosePayment' => PaymentType::ATM,
                'ExpireDate' => $this->ttl,
                'PaymentInfoURL' => $this->paymentInfoUrl,
                'ClientRedirectURL' => $this->clientRedirectUrl,
            ];

        if ($this->subPaymentType) {
            $result += [
                'ChooseSubPayment' => $this->subPaymentType,
            ];
        }

        return $result;
    }

    protected function setTtl(int $ttl = null)
    {
        if ($ttl > 60 || $ttl < 1) {
            throw new \LogicException('ttl only in 1~60 days');
        }

        $this->ttl = $ttl;
    }

    protected function setSubPaymentType(?string $subPaymentType)
    {
        if ($subPaymentType && ! AtmSubType::isValid($subPaymentType)) {
            throw new \LogicException('unsupported sub payment of atm');
        }

        $this->subPaymentType = $subPaymentType;
    }
}
