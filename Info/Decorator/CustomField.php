<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

class CustomField extends InfoDecorator
{
    public const SIZE = 4;

    /**
     * @var Info
     */
    protected $info;

    /**
     * @var string[]
     */
    protected $fields;

    public function __construct(Info $info, string ... $fields)
    {
        $this->info = $info;

        $this->fields = $fields;
    }

    public function getInfo()
    {
        $result = $this->info->getInfo();

        for ($i = 0, $max = min(static::SIZE, count($this->fields)); $i < $max; $i++) {
            $result += [
                'CustomField'.($i+1) => $this->fields[$i],
            ];
        }

        return $result;
    }
}
