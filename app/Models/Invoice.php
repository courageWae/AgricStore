<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ["user_id","user_product_id","status"];

    public function user()
    {
        return $this->belongsTo(User::class);  
    }
}
