<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Constants\PaymentType;

class Cvs extends AbstractCvs
{
    /**
     * 繳費期限, 以天為單位
     * @var int
     */
    protected $ttl;

    public function getInfo()
    {
        $result = $this->info->getInfo() +
            [
                'ChoosePayment' => PaymentType::CVS,
                'StoreExpireDate' => $this->ttl,
                'PaymentInfoURL' => $this->paymentInfoUrl,
                'ClientRedirectURL' => $this->clientRedirectUrl,
            ];

        for ($i = 1; $i < count($this->descriptions); $i++) {
            $result += [
                "Desc_$i" => $this->descriptions[$i],
            ];
        }

        return $result;
    }

    protected function setTtl(int $ttl)
    {
        $this->ttl = $ttl;
    }
}
