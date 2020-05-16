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

    /**
     * @return string|null
     */
    public function getCheckSum()
    {
        return $this->data['CheckMacValue'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getTradeNo()
    {
        return $this->data['TradeNo'] ?? null;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}
