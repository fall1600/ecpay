<?php

namespace fall1600\Package\Ecpay\Constracts;

interface OrderInterface
{
    /** @return string */
    public function getMerchantNo();

    /** @return string */
    public function getTotalAmount();

    /** @return string */
    public function getTradeDesc();

    /** @return string */
    public function getItemName();
}
