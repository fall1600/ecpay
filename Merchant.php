<?php

namespace fall1600\Package\Ecpay;

use fall1600\Package\Ecpay\Exceptions\TradeInfoException;

class Merchant
{
    use Cryption;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $hashKey;

    /**
     * @var string
     */
    protected $hashIv;

    /** @var Response */
    protected $response;

    public function __construct(string $id, string $hashKey, string $hashIv)
    {
        $this->id = $id;

        $this->hashKey = $hashKey;

        $this->hashIv = $hashIv;
    }

    /**
     * @param string $id
     * @param string $hashKey
     * @param string $hashIv
     * @return $this
     */
    public function reset(string $id, string $hashKey, string $hashIv)
    {
        $this->id = $id;
        $this->hashKey = $hashKey;
        $this->hashIv = $hashIv;

        $this->response = null;

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getHashKey()
    {
        return $this->hashKey;
    }

    /**
     * @return string
     */
    public function getHashIv()
    {
        return $this->hashIv;
    }

    /**
     * @param array $rawData
     * @return $this
     * @throws TradeInfoException
     */
    public function setRawData(array $rawData)
    {
        if (! isset($rawData['CheckMacValue']) || ! isset($rawData['MerchantID']) || ! isset($rawData['MerchantTradeNo'])) {
            throw new TradeInfoException('invalid data');
        }

        $this->response = new Response($rawData);
        return $this;
    }
}
