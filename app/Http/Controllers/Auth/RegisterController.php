<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserProduct;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function redirectTo() # redirect user based on role name.
    {
        if( auth()->check() && auth()->user()->role_id === 2)
        {
            $this->storeUserId();
            return route("user.orders") ;
        }
        else
        {
            return route("admin.dashboard");
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_name' => ['required', 'string', 'min:5', 'max:10'],
            'phone' => ['required', 'numeric', 'min:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_name' => $data['user_name'],
            'alias' => Str::of( $data['name'] . " " . $data['user_name'])->slug("-"),
            'role_id' => $data['role_id'] ,
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }

    private function storeUserId()
    {
        if(request()->session()->has("rand"))
        {
            $user_product = UserProduct::where("guest_id", request()->session()->get("rand"))->get();
            $user_product->update("user_id", auth()->user()->id);
        }
    }
}
