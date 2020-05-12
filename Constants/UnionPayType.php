<?php

namespace fall1600\Package\Ecpay\Constants;

class UnionPayType
{
    // 消費者自行決定
    public const PAYER_CALLS = 0;

    // 限定使用銀聯卡
    public const ONLY_UNIONPAY = 1;

    // 不使用銀聯卡
    public const WITHOUT_UNIONPAY = 2;

    /**
     * @param int $input
     * @return bool
     */
    public static function isValid(int $input)
    {
        return in_array($input, [static::PAYER_CALLS, static::ONLY_UNIONPAY, static::WITHOUT_UNIONPAY]);
    }
}
