<?php

namespace fall1600\Package\Ecpay\Contracts;

interface OrderInterface
{
    /** @return string */
    public function getMerchantTradeNo();

    /** @return string */
    public function getTotalAmount();

    /** @return string */
    public function getTradeDesc();

    /** @return string */
    public function getItemName();
}
