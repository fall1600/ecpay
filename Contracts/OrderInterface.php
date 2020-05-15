<?php

namespace fall1600\Package\Ecpay\Contracts;

interface OrderInterface
{
    /** @return string */
    public function getMerchantTradeNo();

    /** @return int */
    public function getTotalAmount();

    /** @return string */
    public function getTradeDesc();

    /**
     * 商品名稱
     *   1. 如果商品名稱有多筆,需在金流選擇頁一行一行顯示商品名稱的話, 商品名稱請以符號#分隔
     *   2. 商品名稱字數限制為中英數 400 字內, 超過此限制系統將自動截斷
     * 可搭配 ItemNameTrait 使用
     * @return string
     */
    public function getItemName();
}
