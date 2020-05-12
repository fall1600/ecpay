<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

class OfflinePay extends InfoDecorator
{
    /** @var Info */
    protected $info;

    /**
     * 離線付款取號完成, 通知系統的callback url
     * @var string
     */
    protected $paymentInfoUrl;

    /**
     * 離線付款的有效繳費天數
     *   綠界支援1~60天, 預設3天
     * @var int
     */
    protected $ttl;

    /**
     * 取號完成後, 從綠界回導系統的網址
     * @var string
     */
    protected $clientRedirectUrl;

    public function __construct(Info $info, string $paymentInfoUrl, int $ttl = null, string $clientRedirectUrl = null)
    {
        $this->info = $info;

        $this->paymentInfoUrl = $paymentInfoUrl;

        $this->setTtl($ttl);

        $this->clientRedirectUrl = $clientRedirectUrl;
    }

    public function getInfo()
    {
        return $this->info->getInfo() +
            [
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
