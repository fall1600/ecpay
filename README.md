# EcPay 綠界

[Official Doc](https://www.ecpay.com.tw/Content/files/ecpay_011.pdf)

## How to use

#### 建立交易資訊 (BasicInfo)
 - $merchantId: 你在綠界申請的商店代號
 - $returnUrl: 用來接收綠界付款通知的callback url
 - $order: 你的訂單物件, 務必實作package 中的OrderInterface
```php
$info = new BasicInfo($merchantId, $returnUrl, $order);
```

#### 建立Ecpay 物件, 注入商店資訊, 帶著交易資訊前往綠界付款
 - $merchantId: 你在綠界商店代號
 - $hashKey: 你在綠界商店專屬的HashKey
 - $hashIv: 你在綠界商店專屬的HashIV
 
```php
$ecpay = new Ecpay();
$ecpay
    ->setIsProduction(false) // 設定環境, 預設就是走正式機
    ->setMerchant(new Merchant($merchantId, $hashKey, $hashIv))
    ->checkout($info);
```

#### 請在你的訂單物件實作 OrderInterface

```php
<?php

namespace Your\Namespace;

use fall1600\Package\Newebpay\Contracts\OrderInterface;

class Order implements OrderInterface
{
    // your order detail...
}

```

#### 解開來自綠界的交易通知
```php
$isValid = $merchant->setRawData($request->all())->validateResponse(); //確認為true 後再往下走

// response 封裝了通知交易的結果, 以下僅列常用methods
$response = $merchant->getResponse();
// 付款成敗
$response->getReturnCode();
// 取得交易序號
$response->getTradeNo();
// 取得訂單編號, 就是OrderInterface 實作的getMerchantOrderNo
$response->getMerchantOrderNo();
// 付款時間
$response->getPaymentDate();
// 整包payload
$response->getDate();
```


#### 各種url 你分的清楚嗎?
| Name             | 用途                                  | 設定的物件    |    備註                                                   |
|:-----------------|:------------------------------------ |:-------------|:---------------------------------------------------------|
| ReturnURL        | 通知你系統交易資訊的callback url         | BasicInfo    | 通常用在訂單付款狀態切換, 最重要,所以BasicInfo 就要設定了, 記得此webhook 檢查完checksum 後要return 1｜OK (半形的｜) 給綠界   |
| OrderResultURL   | 付款完成回到你系統的位置                 | PayComplete   | 沒設定就是顯示在綠界                                        |
| PaymentInfoURL   | 離線付款取號完成通知你系統的callback url  | Atm, Barcode, Cvs   | 用在紀錄離線付款的取號, 務必設定                            |
| ClientRedirectURL| 離線付款取號完成要回到你系統的位置         | Atm, Barcode, Cvs   | 沒設定就是顯示在綠界                            |
| ClientBackURL    | 任何時候在綠界想返回你系統的位置           | PayCancel    | 沒設定在綠界就不會顯示[返回商店]                                        |
| PeriodReturnURL  | 定期定額授權結果回傳通知你系統的 callback url | 缺物件           |                                       |

 