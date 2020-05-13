<?php

namespace fall1600\Package\Ecpay\Contracts;

interface CustomerInterface
{
    // 客戶編號
    public function getId();

    // 客戶統編
    public function getTaxId();

    // 客戶名稱
    public function getName();

    // 客戶地址
    public function getAddress();

    // 客戶手機
    public function getPhone();

    // 客戶email
    public function getEmail();
}
