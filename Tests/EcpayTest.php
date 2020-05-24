<?php

namespace fall1600\Package\Ecpay\Tests;

use fall1600\Package\Ecpay\Constants\PaymentType;
use fall1600\Package\Ecpay\Contracts\OrderInterface;
use fall1600\Package\Ecpay\Ecpay;
use fall1600\Package\Ecpay\Info\BasicInfo;
use fall1600\Package\Ecpay\Info\Decorator\Cvs;
use fall1600\Package\Ecpay\Info\Decorator\IgnorePayment;
use fall1600\Package\Ecpay\Info\Decorator\PayInPeriods;
use fall1600\Package\Ecpay\Merchant;
use PHPUnit\Framework\TestCase;

class EcpayTest extends TestCase
{
    public function test_generateForm()
    {
        //arrange
        $ecpay = new Ecpay();

        $order = $this->getMockBuilder(OrderInterface::class)
            ->getMock();

        $merchant = $this->getMockBuilder(Merchant::class)
            ->disableOriginalConstructor()
            ->getMock();

        $merchant->expects($this->once())
            ->method('countChecksum')
            ->willReturn($checksum = '123456.checksum');

        $info = new BasicInfo('123', 'http://return.url', $order);
        $info = new IgnorePayment(
            $info,
            'ATM',
            'BARCODE',
            'WebATM'
        );

        $info = new PayInPeriods($info);
        $info = new Cvs($info, 'payment.info.url', 'client.redirect.url', 5);

        $expected = <<<EOT
        <form name="ecpay" id="ecpay-form" method="post" action="https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5" style="display:none;">
            <input name="CheckMacValue" value="$checksum" type="hidden"/>
            <input type='hidden' name='CheckMacValue' value='123456.checksum' />
            <input type='hidden' name='MerchantID' value='123' />
            <input type='hidden' name='MerchantTradeNo' value='' />
            <input type='hidden' name='MerchantTradeDate' value='2020/05/15 23:59:42' />
            <input type='hidden' name='PaymentType' value='aio' />
            <input type='hidden' name='TotalAmount' value='' /><input type='hidden' name='TradeDesc' value='' />
            <input type='hidden' name='ItemName' value='' /><input type='hidden' name='ReturnURL' value='http://return.url' />
            <input type='hidden' name='ChoosePayment' value='ALL' />
            <input type='hidden' name='EncryptType' value='1' />
            <input type='hidden' name='IgnorePayment' value='ATM#BARCODE#WebATM' />
        </form>
        EOT;

        //act
        $result = $ecpay
            ->setIsProduction(false)
            ->setMerchant($merchant)
            ->generateForm($info);

        //assert
        var_dump($result);
//        $this->assertEquals($expected, $result);
    }
}
