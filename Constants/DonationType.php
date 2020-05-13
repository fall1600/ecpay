<?php

namespace fall1600\Package\Ecpay\Constants;

use MyCLabs\Enum\Enum;

class DonationType extends Enum
{
    // 捐贈
    public const DONATE = 1;

    // 不捐贈或統編
    public const NOT_DONATE = 0;
}
