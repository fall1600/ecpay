<?php

namespace fall1600\Package\Ecpay\Info\Decorator;

use fall1600\Package\Ecpay\Constants\LanguageType;
use fall1600\Package\Ecpay\Info\Info;
use fall1600\Package\Ecpay\Info\InfoDecorator;

class Language extends InfoDecorator
{
    /**
     * @var Info
     */
    protected $info;

    /**
     * @var string
     */
    protected $language;

    public function __construct(Info $info, string $language)
    {
        $this->info = $info;

        $this->setLanguage($language);
    }

    public function getInfo()
    {
        return $this->info->getInfo() +
            [
                'Language' => $this->language,
            ];
    }

    protected function setLanguage(string $language)
    {
        if (! LanguageType::isValid($language)) {
            throw new \LogicException('unsupported language');
        }

        $this->language = $language;
    }
}
