<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserProduct;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = ['guest_id'];

    public function UserProduct()
    {
        return $this->hasMnay(UserProduct::class);
    }
}
