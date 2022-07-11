<?php

namespace App\Interfaces;

interface CryptoInterface
{
    public function fetchAll($number);
    public function  fetchSingle($name);
    public function filteredCrypto($number);
}
