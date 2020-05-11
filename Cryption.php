<?php

namespace fall1600\Package\Ecpay;

use fall1600\Package\Ecpay\Info\Info;

trait Cryption
{
    protected $hashKey;

    protected $hashIv;

    /**
     * 文件p.47
     *   綠界說怎麼算就怎麼算
     * @param  Info  $info
     * @return string
     */
    public function countCheckSum(Info $info)
    {
        $infoPayload = $info->getInfo();

        // 參數依照字母排序
        ksort($infoPayload);

        // 不能直接使用http_build_query, 否則中文會預先url encode 過
        $str = "HashKey=$this->hashKey";
        foreach ($infoPayload as $key => $value) {
            $str .= "&$key=$value";
        }
        $str .= "&HashIV=$this->hashIv";

        // url encode
        $strEncoded = urlencode($str);

        // 轉小寫
        $strLower = strtolower($strEncoded);

        // 代換成 .Net 成接受的字元
        $strReplaced = $this->replaceSymbol($strLower);

        // 用sha256 hash
        $strHashed = hash('sha256', $strReplaced);

        // 轉大寫
        return strtoupper($strHashed);
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
