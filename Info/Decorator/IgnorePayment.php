<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Constants\PaymentType;
use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

class IgnorePayment extends InfoDecorator
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * @var string[]
     */
    protected $ignores;

    public function __construct(Info $info, string ... $ignores)
    {
        $this->info = $info;

        $this->setIgnores($ignores);
    }

    public function getInfo()
    {
        return $this->info->getInfo() +
            [
                'IgnorePayment' => implode('#', $this->ignores),
            ];
    }

    protected function setIgnores(array $ignores)
    {
        foreach ($ignores as $ignore) {
            if (! PaymentType::isValid($ignore)) {
                throw new \LogicException("unsupported payment type $ignore");
            }
        }

        $this->ignores = $ignores;
    }
}
