<?php

namespace fall1600\Package\Ecpay\Tests;

use fall1600\Package\Ecpay\Constants\PaymentType;
use fall1600\Package\Ecpay\Contracts\OrderInterface;
use fall1600\Package\Ecpay\Info\BasicInfo;
use fall1600\Package\Ecpay\Merchant;
use PHPUnit\Framework\TestCase;

class MerchantTest extends TestCase
{
    public function test_countCheckSum()
    {
        //arrange
        $merchantId = '2000132';

        $hashKey = '5294y06JbISpM5x9';

        $hashIv = 'v77hoKGq4kWxNNIS';

        $merchant = new Merchant($merchantId, $hashKey, $hashIv);

        $returnUrl = 'https://www.ecpay.com.tw/receive.php';

        $order = $this->getMockBuilder(OrderInterface::class)
            ->getMock();

        $order->expects($this->once())
            ->method('getMerchantTradeNo')
            ->willReturn('ecpay20130312153023');

        $order->expects($this->once())
            ->method('getTradeDesc')
            ->willReturn('促銷方案');

        $order->expects($this->once())
            ->method('getItemName')
            ->willReturn('Apple iphone 7 手機殼');

        $order->expects($this->once())
            ->method('getTotalAmount')
            ->willReturn(1000);

        $info = $this->getMockBuilder(BasicInfo::class)
            ->disableOriginalConstructor()
            ->getMock();

        $info->expects($this->once())
            ->method('getInfo')
            ->willReturn([
                'MerchantID' => $merchantId,
                'MerchantTradeNo' => $order->getMerchantTradeNo(),
                'MerchantTradeDate' => '2013/03/12 15:30:23',
                'PaymentType' => 'aio',
                'TotalAmount' => $order->getTotalAmount(),
                'TradeDesc' => $order->getTradeDesc(),
                'ItemName' => $order->getItemName(),
                'ReturnURL' => $returnUrl,
                'ChoosePayment' => PaymentType::ALL,
                'EncryptType' => 1,
            ]);

        $expected = 'CFA9BDE377361FBDD8F160274930E815D1A8A2E3E80CE7D404C45FC9A0A1E407';

        //act
        $result = $merchant->countCheckSum($info);

        //assert
        $this->assertEquals($expected, $result);
    }
}
