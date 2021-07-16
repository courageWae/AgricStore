<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;


class EquipmentController extends Controller
{
    public function index()
    {
        return view('BigStore.equipments')->with("equipments", Equipment::get());
    }
}
