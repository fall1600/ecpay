<?php

namespace fall1600\Package\Ecpay\Constants;

use MyCLabs\Enum\Enum;

class UnionPayType extends Enum
{
    // 消費者自行決定
    public const PAYER_CALLS = 0;

    // 限定使用銀聯卡
    public const ONLY_UNIONPAY = 1;

    // 不使用銀聯卡
    public const WITHOUT_UNIONPAY = 2;
}
