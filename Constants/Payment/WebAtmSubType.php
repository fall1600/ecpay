<?php

namespace fall1600\Package\Ecpay\Constants\Payment;

use MyCLabs\Enum\Enum;

class WebAtmSubType extends Enum
{
    // WebATM_台新
    public const TAISHIN = 'TAISHIN';

    // WebATM_玉山(暫不提供)
    public const ESUN = 'ESUN';

    // WebATM_台灣銀行
    public const BOT = 'BOT';

    // WebATM_台北富邦
    public const FUBON = 'FUBON';

    // WebATM_中國信託
    public const CHINATRUST = 'CHINATRUST';

    // WebATM_第一銀行(暫不提供)
    public const FIRST = 'FIRST';

    // WebATM_國泰世華
    public const CATHAY = 'CATHAY';

    // WebATM_兆豐銀行
    public const MEGA = 'MEGA';

    // WebATM_土地銀行
    public const LANG = 'LANG';

    // WebATM_大眾銀行
    public const TACHONG = 'TACHONG';

    // WebATM_永豐銀行
    public const SINOPAC = 'SINOPAC';
}
