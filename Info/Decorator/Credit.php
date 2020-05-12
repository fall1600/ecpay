<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Contracts\QuickCreditInterface;
use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

class Credit extends InfoDecorator
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * @var QuickCreditInterface
     */
    protected $quickCredit;

    public function __construct(Info $info, QuickCreditInterface $quickCredit)
    {
        $this->info = $info;

        $this->quickCredit = $quickCredit;
    }

    public function getInfo()
    {
        return $this->info->getInfo() +
            [
                'ChoosePayment' => 'Credit',
                'BindingCard' => $this->quickCredit->getIsBindingCard()? 1: 0,
                'MerchantMemberID' => $this->quickCredit->getMerchantMemberId(),
            ];
    }
}
