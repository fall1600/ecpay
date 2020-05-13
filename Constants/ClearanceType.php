<?php

namespace fall1600\Package\Ecpay\Constants;

use MyCLabs\Enum\Enum;

class ClearanceType extends Enum
{
    // 非經海關出口
    public const NOT_CUSTOMS = 1;

    // 經海關出口
    public const CUSTOMS = 2;
}
