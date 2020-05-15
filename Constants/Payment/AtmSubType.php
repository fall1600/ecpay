<?php

namespace fall1600\Package\Ecpay\Constants\Payment;

use MyCLabs\Enum\Enum;

class AtmSubType extends Enum
{
    // ATM_台新
    public const TAISHIN = 'TAISHIN';

    // ATM_玉山(暫不提供)
    public const ESUN = 'ESUN';

    // ATM_台灣銀行
    public const BOT = 'BOT';

    // ATM_台北富邦
    public const FUBON = 'FUBON';

    // ATM_中國信託
    public const CHINATRUST = 'CHINATRUST';

    // ATM_第一銀行(暫不提供)
    public const FIRST = 'FIRST';

    // ATM_國泰世華
    public const CATHAY = 'CATHAY';

    // ATM_土地銀行
    public const LANG = 'LANG';

    // ATM_大眾銀行
    public const TACHONG = 'TACHONG';
}
