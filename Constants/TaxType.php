<?php

namespace fall1600\Package\Ecpay\Constants;

use MyCLabs\Enum\Enum;

class TaxType extends Enum
{
    // 應稅
    public const TAXABLE = 1;

    // 零稅率
    public const ZERO_TAX_RATE = 2;

    // 免稅
    public const DUTY_FREE = 3;
}
