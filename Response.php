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
     * 特店旗下店舖代號
     * @return string|null
     */
    public function getSubMerchant()
    {
        return $this->data['StoreID'] ?? null;
    }

    /**
     * 交易狀態
     *   若回傳值為 1 時, 為付款成功其餘代碼皆為交易異常, 請至廠商管理後台確認後再出貨。
     * @return int|null
     */
    public function getReturnCode()
    {
        return $this->data['RtnCode'] ?? null;
    }

    /**
     * Server POST 成功回傳:交易成功
     * Server POST 補送通知回傳:paid
     * Client POST 成功回傳:Succeeded
     * @return string|null
     */
    public function getReturnMessage()
    {
        return $this->data['RtnMsg'] ?? null;
    }

    /**
     * @return string|null
     */
    public function getChecksum()
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
     * 交易金額
     * @return int|null
     */
    public function getTradeAmt()
    {
        return $this->data['TradeAmt'] ?? null;
    }

    /**
     * 付款時間(yyyy/MM/dd HH:mm:ss)
     * @return string|null
     */
    public function getPaymentDate()
    {
        return $this->data['PaymentDate'] ?? null;
    }

    /**
     * 付款方式
     * @return string|null
     */
    public function getPaymentType()
    {
        return $this->data['PaymentType'] ?? null;
    }

    /**
     * 通路費
     * @return int|null
     */
    public function getPaymentTypeChargeFee()
    {
        return $this->data['PaymentTypeChargeFee'] ?? null;
    }

    /**
     * 訂單成立時間(yyyy/MM/dd HH:mm:ss)
     * @return string|null
     */
    public function getTradeDate()
    {
        return $this->data['TradeDate'] ?? null;
    }

    /**
     * 是否為模擬付款
     * @return bool
     */
    public function isSimulated()
    {
        return (bool) $this->data['SimulatePaid'];
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
