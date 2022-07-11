<?php

namespace App\Repositories;

use App\Interfaces\CryptoInterface;
use WisdomDiala\Cryptocap\Facades\Cryptocap;

class CryptoRepository implements CryptoInterface
{

    /**
     * @return mixed
     */
    public function fetchAll($number)
    {
        return Cryptocap::getAssetsWithLimit($number)->data;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function fetchSingle($name)
    {
        return Cryptocap::getSingleAsset($name)->data;
    }

    /**
     * @return mixed
     */
    public function filteredCrypto($number)
    {
        $arr = $this->fetchAll($number);
        $val = 1;
        foreach ($arr  as $key => $value){
            if ($val == $value->rank){
                unset($arr[$key]);
            }
        }
        return $arr;
    }
}
