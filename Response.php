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
     * 原始交易資訊, 可用此payload 運算綠界來的checksum 是否正確
     * @return array
     */
    public function getOriginInfoPayload()
    {
        return array_diff_key($this->data, ['CheckMacValue' => 1]);
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}
