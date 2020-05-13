<?php

namespace fall1600\Package\Ecpay\Contracts;

interface InvoiceItemInterface
{
    /** @return int */
    public function getCount();

    /** @return string */
    public function getName();

    /** @return string */
    public function getWord();

    /** @return int */
    public function getPrice();

    /** @return string */
    public function getTaxType();
}