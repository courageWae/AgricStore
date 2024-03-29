<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\UserProduct;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ["name"] ;

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function userProduct()
    {
        return $this->hasMany(UserProduct::class);
    }

}
