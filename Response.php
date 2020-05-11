<?php

namespace fall1600\Package\Ecpay;

class Response
{
    /** @var array */
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return string|null
     */
    public function getMerchantId()
    {
        return $this->data['MerchantID'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getMerchantTradeNo()
    {
        return $this->data['MerchantTradeNo'] ?? null;
    }
}
