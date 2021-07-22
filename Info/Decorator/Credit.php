<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Constants\PaymentType;
use fall1600\Package\Ecpay\Contracts\QuickCreditInterface;
use fall1600\Package\Ecpay\Info\Info;

class Credit extends Info
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
        $result = array_merge($this->info->getInfo(), [
            'ChoosePayment' => PaymentType::CREDIT,
        ]);

        // 有帶QuickCredit 就是要啟用快速結帳, 所以BindingCard 帶1
        if ($this->quickCredit) {
            $result += [
                'BindingCard' => 1,
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
