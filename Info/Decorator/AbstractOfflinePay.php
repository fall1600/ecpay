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
     * @var string
     */
    protected $paymentInfoUrl;

    /**
     * @var string|null
     */
    protected $clientRedirectUrl;

    abstract protected function setTtl(int $ttl);

    public function __construct(Info $info, string $paymentInfoUrl, int $ttl = null, string $clientRedirectUrl = null)
    {
        $this->info = $info;

        $this->paymentInfoUrl = $paymentInfoUrl;

        $this->setTtl($ttl);

        $this->clientRedirectUrl = $clientRedirectUrl;
    }
}
