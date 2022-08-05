<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use App\Facades\PlanFacade;
use App\Facades\CryptoFacade;

class FrontendController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @noinspection PhpMissingReturnTypeInspection
     */

    public function landing()
      {
          //dd($this->crypto->filteredCrypto(10));
         // dd(CryptoFacade::fetchAll(10));
          return view('pages.index',[
              'cryptocurrencies'=> CryptoFacade::fetchAll(10) ?? null
              //'singleCrypto'=>CryptoFacade::fetchSingle('bitcoin')
          ]);
      }
      public function about()
      {
          if (Cache::has('cachedAbout')){
              return Cache::get('cachedAbout');
          }
          $cachedPage = view('pages.about')->render();
          Cache::put('cachedAbout', $cachedPage, now()->addDays(30));
          return $cachedPage;
      }
    public function contact()
    {
        return view('pages.contact');
    }
    public function faq()
    {
        if (Cache::has('cachedFAQ')){
            return Cache::get('cachedFAQ');
        }
        $cachedPage = view('pages.faq')->render();
        Cache::put('cachedFAQ', $cachedPage, now()->addDays(30));
        return $cachedPage;
    }
    public function privacy()
    {
        if (Cache::has('cachedPrivacyPolicy')){
            return Cache::get('cachedPrivacyPolicy');
        }
        $cachedPage = view('pages.privacy-policy')->render();
        Cache::put('cachedPrivacyPolicy', $cachedPage, now()->addDays(30));
        return $cachedPage;
    }
    public function terms()
    {
        if (Cache::has('cachedTermsConditions')){
            return Cache::get('cachedTermsConditions');
        }
        $cachedPage = view('pages.terms-conditions')->render();
        Cache::put('cachedTermsConditions', $cachedPage, now()->addDays(30));
        return $cachedPage;
    }
    public function plans()
    {
        return view('pages.plans', [
           'plans'=>PlanFacade::all()
        ]);
    }
    public function offline()
    {
        return view('pages.offline');
    }
}
