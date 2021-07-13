<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BigStoreController extends Controller
{
    public function index()
    {
        return view('BigStore.home') ;
    }

    public function equipments()
    {
        return view('BigStore.equipments');
    }

}
