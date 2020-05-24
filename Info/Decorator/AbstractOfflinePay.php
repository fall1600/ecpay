<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

abstract class AbstractOfflinePay extends InfoDecorator
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * 離線付款取號完成通知你系統的callback url
     * @var string
     */
    protected $paymentInfoUrl;

    /**
     * 離線付款取號完成要回到你系統的位置
     * @var string|null
     */
    protected $clientRedirectUrl;

    abstract protected function setTtl(int $ttl);

    public function __construct(Info $info, string $paymentInfoUrl, string $clientRedirectUrl = null, int $ttl = null)
    {
        $this->info = $info;

        $this->paymentInfoUrl = $paymentInfoUrl;

        $this->clientRedirectUrl = $clientRedirectUrl;

        $this->setTtl($ttl);
    }
}
