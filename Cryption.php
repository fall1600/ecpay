<?php

namespace fall1600\Package\Ecpay;

use fall1600\Package\Ecpay\Info\Info;

trait Cryption
{
    protected $hashKey;

    protected $hashIv;

    public function countCheckSum(Info $info)
    {
        $infoPayload = $info->getInfo();

        ksort($infoPayload);

        $str = "HashKey=$this->hashKey";
        foreach ($infoPayload as $key => $value) {
            $str .= "&$key=$value";
        }
        $str .= "&HashIV=$this->hashIv";

        $strEncoded = urlencode($str);

        $strLower = strtolower($strEncoded);

        $strReplaced = $this->replaceSymbol($strLower);

        $strMd5ed = hash('sha256', $strReplaced);

        return strtoupper($strMd5ed);
    }

    protected function replaceSymbol(string $str)
    {
        if(! empty($str)) {
            $str = str_replace('%2D', '-', $str);
            $str = str_replace('%2d', '-', $str);
            $str = str_replace('%5F', '_', $str);
            $str = str_replace('%5f', '_', $str);
            $str = str_replace('%2E', '.', $str);
            $str = str_replace('%2e', '.', $str);
            $str = str_replace('%21', '!', $str);
            $str = str_replace('%2A', '*', $str);
            $str = str_replace('%2a', '*', $str);
            $str = str_replace('%28', '(', $str);
            $str = str_replace('%29', ')', $str);
        }

        return $str ;
    }
}
