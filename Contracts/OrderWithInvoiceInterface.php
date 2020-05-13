<?php

namespace fall1600\Package\Ecpay\Contracts;

interface OrderWithInvoiceInterface extends OrderInterface
{
    // 特店自訂編號
    public function getRelateNumber();

    // 課稅類別
    public function getTaxType();

    // 捐贈註記
    public function getDonation();
}
