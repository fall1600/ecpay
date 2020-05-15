<?php

namespace fall1600\Package\Ecpay\Constants\Payment;

use MyCLabs\Enum\Enum;

class CvsSubType extends Enum
{
    // 超商代碼繳款
    public const CVS = 'CVS';

    // OK 超商代碼繳款
    public const OK = 'OK';

    // 全家超商代碼繳款
    public const FAMILY = 'FAMILY';

    // 萊爾富超商代碼繳款
    public const HILIFE = 'HILIFE';

    // 7-11 ibon 代碼繳款
    public const IBON = 'IBON';
}
