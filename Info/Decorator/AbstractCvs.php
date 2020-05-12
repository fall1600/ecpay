<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;

abstract class AbstractCvs extends AbstractOfflinePay
{
    public const DESCRIPTION_SIZE = 4;

    /**
     * @var string[]
     */
    protected $descriptions;

    public function __construct(Info $info, string $paymentInfoUrl, string $clientRedirectUrl = null, int $ttl = null, string ... $descriptions)
    {
        parent::__construct($info, $paymentInfoUrl, $ttl, $clientRedirectUrl);

        $this->descriptions = array_slice($descriptions, 0, static::DESCRIPTION_SIZE);
    }
}
