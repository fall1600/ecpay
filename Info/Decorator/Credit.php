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

    /**
     * 是否啟用紅利折抵
     * @var bool
     */
    protected $isRedeem;

    public function __construct(Info $info, QuickCreditInterface $quickCredit = null, bool $isRedeem = false)
    {
        $this->info = $info;

        $this->quickCredit = $quickCredit;

        $this->isRedeem = $isRedeem;
    }

    public function getInfo()
    {
        $result = $this->info->getInfo() +
            [
                'ChoosePayment' => 'Credit',
            ];

        if ($this->quickCredit)  {
            $result += [
                'BindingCard' => $this->quickCredit->getIsBindingCard()? 1: 0,
                'MerchantMemberID' => $this->quickCredit->getMerchantMemberId(),
            ];
        }

        if ($this->isRedeem) {
            $result += [
                'Redeem' => 'Y',
            ];
        }

        return $result;
    }
}
