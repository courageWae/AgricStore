<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Guest;
use App\Models\Category;

class UserProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_name", 
        "price", "discount", 
        "weight", 
        "category_id", 
        "photo", 
        "user_id",
        "product_id", 
        "guest_id", 
        "quantity",
        "total_price"
    ] ;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
