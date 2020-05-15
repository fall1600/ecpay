<?php

namespace fall1600\Package\Ecpay\Info;

class BasicInfo extends Info
{
    /**
     * ReturnURL 用來收付款結果通知, 收到後, 請正確回應 1|OK 給綠界
     * @return array
     */
    public function getInfo()
    {
        return [
            'MerchantID' => $this->merchantId,
            'MerchantTradeNo' => $this->order->getMerchantTradeNo(),
            'MerchantTradeDate' => date('Y/m/d H:i:s'),
            'PaymentType' => 'aio',
            'TotalAmount' => $this->order->getTotalAmount(),
            'TradeDesc' => $this->order->getTradeDesc(),
            'ItemName' => $this->order->getItemName(),
            'ReturnURL' => $this->returnUrl,
            'ChoosePayment' => $this->paymentType,
            'EncryptType' => 1,
        ];
    }
}
