<?php

namespace fall1600\Package\Ecpay\Constants;

use MyCLabs\Enum\Enum;

class PaymentType extends Enum
{
    public const CREDIT = 'Credit';
    public const WEBATM = 'WebATM';
    public const ATM = 'ATM';
    public const CVS = 'CVS';
    public const BARCODE = 'BARCODE';
    public const ALL = 'ALL';
}
