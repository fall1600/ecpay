<?php

namespace fall1600\Package\Ecpay\Constants;

use MyCLabs\Enum\Enum;

class CarrierType extends Enum
{
    // 無載具
    public const EMPTY = '';

    // 特店載具
    public const CARRIER = 1;

    // 自然人憑證(Citizen Digital Certificate)
    public const CDC = 2;

    // 手機條碼
    public const BARCODE = 3;
}
