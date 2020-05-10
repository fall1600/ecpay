<?php

namespace fall1600\Package\Ecpay;

use fall1600\Package\Ecpay\Info\Info;

class Ecpay
{
    /**
     * 付款-測試環境
     * @var string
     */
    public const CHECKOUT_URL_TEST = 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5';

    /**
     * 付款-正式環境
     * @var string
     */
    public const CHECKOUT_URL_PRODUCTION = 'https://payment.ecpay.com.tw/Cashier/AioCheckOut/V5';

    /**
     * 查詢付款資訊-測試環境
     * @var string
     */
    public const QUERY_URL_TEST = 'https://payment-stage.ecpay.com.tw/Cashier/QueryTradeInfo/V5';

    /**
     * 查詢付款資訊-正式環境
     * @var string
     */
    public const QUERY_URL_PRODUCTION = 'https://payment.ecpay.com.tw/Cashier/QueryTradeInfo/V5';

    /**
     * 決定URL 要使用正式或測試機
     * @var bool
     */
    protected $isProduction = true;

    /** @var string */
    protected $formId = 'ecpay-form';

    public function checkout(Info $info)
    {
        echo <<<EOT
        <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="utf-8">
                </head>
                <body>
                    {$this->generateForm($info)}
                    <script>
                        var form = document.getElementById("$this->formId");
                        form.submit();
                    </script>
                </bod>
            </html>
        EOT;
    }

    public function query()
    {
    }

    public function generateForm(Info $info)
    {
        $url = $this->isProduction? static::CHECKOUT_URL_PRODUCTION: static::CHECKOUT_URL_TEST;

        return <<<EOT
        <form name="newebpay" id="{$this->formId}" method="post" action="{$url}" style="display:none;">
            <input type="text" name="CheckMacValue" value="{$info->get}">
        </form>
        EOT;
    }

    /**
     * @param bool $isProduction
     * @return $this
     */
    public function setIsProduction(bool $isProduction)
    {
        $this->isProduction = $isProduction;

        return $this;
    }
}
