<?php

namespace App\Repositories;

use App\Exceptions\InternetConnection;
use App\Interfaces\CryptoInterface;
use Illuminate\Support\Facades\Log;
use WisdomDiala\Cryptocap\Facades\Cryptocap;

class CryptoRepository implements CryptoInterface
{

    /**
     * @return mixed
     * @throws InternetConnection
     */
    public function fetchAll($number)
    {
        try {
            return Cryptocap::getAssetsWithLimit($number)->data;
        } catch(\Exception $exception){
            Log::error($exception->getMessage());
            throw new InternetConnection();
        }
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
//        $val = 1;
//        foreach ($arr  as $key => $value){
//            if ($val == $value->rank){
//                unset($arr[$key]);
//            }
//        }
        return $arr;
    }
}
