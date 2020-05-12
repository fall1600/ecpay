<?php

namespace fall1600\Package\Ecpay\Contracts;

interface QuickCreditInterface
{
    /**
     * @return bool
     */
    public function getIsBindingCard();

    /**
     * 記憶卡號識別碼 string(30)
     * @return string
     */
    public function getMerchantMemberId();
}
