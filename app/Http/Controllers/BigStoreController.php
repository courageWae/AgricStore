<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\Fertilizer;
use App\Models\FoodStuff;

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
        $fertilizer = Fertilizer::whereNotNull("discount")->get()->toArray();
        $equipment = Equipment::whereNotNull("discount")->get()->toArray();
        $foodStuff = FoodStuff::whereNotNull("discount")->get()->toArray();
        $special_offer = array_merge($fertilizer, $equipment, $foodStuff) ;
        return $special_offer ;
    }

}
