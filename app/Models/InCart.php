<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InCart extends Model
{
    use HasFactory;

    protected $fillable = ["guest_id"]
}
