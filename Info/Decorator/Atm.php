<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Constants\PaymentType;
use fall1600\Package\Ecpay\Info\Info;

class Atm extends AbstractOfflinePay
{
    /**
     * 繳費天數
     *   綠界支援1~60天, 預設3天
     * @var int
     */
    protected $ttl;

    public function __construct(Info $info, string $paymentInfoUrl, int $ttl = null, string $clientRedirectUrl = null)
    {
        parent::__construct($info, $paymentInfoUrl, $ttl, $clientRedirectUrl);
    }

    public function getInfo()
    {
        return $this->info->getInfo() +
            [
                'ChoosePayment' => PaymentType::ATM,
                'ExpireDate' => $this->ttl,
                'PaymentInfoURL' => $this->paymentInfoUrl,
                'ClientRedirectURL' => $this->clientRedirectUrl,
            ];
    }

    protected function setTtl(int $ttl = null)
    {
        if ($ttl > 60 || $ttl < 1) {
            throw new \LogicException('ttl only in 1~60 days');
        }

        $this->ttl = $ttl;
    }
}
