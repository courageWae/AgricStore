<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FoodStuff;



class FoodStuffController extends Controller
{
    public function index()
    {
        return view('BigStore.foodStuffs')->with("food_stuffs", FoodStuff::get());
    }
}
