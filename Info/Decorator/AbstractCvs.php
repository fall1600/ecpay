<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Constants\PaymentType;
use fall1600\Package\Ecpay\Info\Info;

abstract class AbstractCvs extends AbstractOfflinePay
{
    public const DESCRIPTION_SIZE = 4;

    /**
     * @var string[]
     */
    protected $descriptions;

    abstract protected function setSubPaymentType(string $subPaymentType);

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

        if ($this->subPaymentType) {
            $result += [
                'ChooseSubPayment' => $this->subPaymentType,
            ];
        }

        return $result;
    }

    public function __construct(Info $info, string $paymentInfoUrl, string $clientRedirectUrl = null, int $ttl = null, string $subPaymentType = null , string ... $descriptions)
    {
        parent::__construct($info, $paymentInfoUrl, $clientRedirectUrl, $ttl);

        $this->descriptions = array_slice($descriptions, 0, static::DESCRIPTION_SIZE);

        if ($subPaymentType) {
            $this->setSubPaymentType($subPaymentType);
        }
    }
}
