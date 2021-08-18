<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UserProduct;

class BigStoreController extends Controller
{
    public function index()
    {
        return view('BigStore.home')->with("special_offers", $this->specialOffer()) ;
    }
 
    public function contact()
    {
        return view('BigStore.contact');
    }

    private function specialOffer()
    {
        $products = Product::where("discount", ">", 0)->get();
        return $products ;
    }

}
