<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodStuff extends Model
{
    use HasFactory;

    protected $fillable = ["product_name", "price", "discount", "clicks", "weight"] ;

}
