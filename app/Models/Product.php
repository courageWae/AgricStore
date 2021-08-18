<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ["product_name", "price", "discount", "clicks", "weight", "category_id", "photo", "user_id", "new_price" ] ;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    

    public function scopeFertilizer( $query )
    {
        return $query->where("category_id", 1);
    }

    public function scopeEquipment( $query )
    {
        return $query->where("category_id", 2);
    }

    public function scopeFoodStuff( $query )
    {
        return $query->where("category_id", 3);
    }

}
