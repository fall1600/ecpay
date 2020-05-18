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
     * OrderInterface 提供給綠界的 MerchantTradeNo, 由特店(應用層系統)提供
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
     * 綠界的交易編號, 由綠界提供
     * @return string|null
     */
    public function getTradeNo()
    {
        return $this->data['TradeNo'] ?? null;
    }

    /**
     * 原始交易資訊, 可用此payload 計算checksum, 確認綠界來的checksum 是否相符
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
