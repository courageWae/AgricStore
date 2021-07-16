<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fertilizer;


class FertilizerController extends Controller
{
    public function index()
    {
        return view('BigStore.fertilizers')->with("fertilizers", Fertilizer::get());
    }

}
