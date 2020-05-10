<?php

namespace fall1600\Package\Ecpay;

class Merchant
{
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
}
