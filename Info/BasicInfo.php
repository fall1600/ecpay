<?php

namespace fall1600\Package\Ecpay\Info;

class BasicInfo extends Info
{
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
