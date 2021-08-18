<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\Invoice;
use App\Models\UserProduct;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role_id',
        'user_name',
        'alias',
        'verification_code',
        'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() # creating a database relationship with role table
    {
        return $this->belongsTo(Role::class);
    }

    public function userProduct()
    {
        return $this->hasMany(UserProduct::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }



    public function getRoutKeyName()
    {
        return "alias" ;
    }

    public function scopeClient( $query )
    {
        return $this->where("role_id", 2)->get() ;
    }

    public function scopeAdmin( $query )
    {
        return $this->where("role_id", 1)->get();
    }

}
