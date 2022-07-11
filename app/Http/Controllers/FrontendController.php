<?php

namespace App\Http\Controllers;

use App\Interfaces\CryptoInterface;

class FrontendController extends Controller
{
    private CryptoInterface $crypto;
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function __construct(CryptoInterface $crypto)
    {
       $this->crypto = $crypto;
    }
    public function landing()
      {
          //dd($this->crypto->filteredCrypto(10));
          return view('pages.index',[
              'cryptocurrencies'=>$this->crypto->filteredCrypto(15),
              'singleCrypto'=>$this->crypto->fetchSingle('bitcoin')
          ]);
      }
      public function about()
      {
          return view('pages.about');
      }
    public function contact()
    {
        return view('pages.contact');
    }
    public function faq()
    {
        return view('pages.faq');
    }
    public function privacy()
    {
        return view('pages.privacy-policy');
    }
    public function terms()
    {
        return view('pages.terms-conditions');
    }
    public function plans()
    {
        return view('pages.plans');
    }
}
