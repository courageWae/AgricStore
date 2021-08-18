<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Product;
use App\Models\Invoice;
use App\Models\UserProduct;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['user', 'auth']) ;
    }

    public function index()
    {
        return view("user.orders") ;
    }

    public function profile()
    {
    	return view('user.profile');
    }

    public function edit_profile()
    {
    	return view('user.edit_profile');
    }

    public function update_profile(User $client)
    {
        if( request()->hasFile("photo"))
        {
            request()->validate([ # validate incoming request
                'name' => ['required', 'string', 'max:255'],
                'photo' => ['mimes : jpeg,jpg,png', 'image'],
                'email' => ['string', 'email'],
                'phone' => ['required'],
                'user_name' => ['required']
            ]);

            $path = request()->file("photo")->store("product", "public");
            $client->update([
                "name" => request()->name,
                "user_name" => request()->user_name,
                "email" => request()->email,
                "phone" => request()->phone,
                "photo" => $path
            ]);
        }
        else
        {
            request()->validate([ # validate incoming request
                'name' => ['required', 'string', 'max:255'],
                'photo' => ['mimes : jpeg,jpg,png', 'image'],
                'email' => ['string', 'email'],
                'phone' => ['required'],
                'user_name' => ['required']
            ]);

            $client->update([
                "name" => request()->name,
                "user_name" => request()->user_name,
                "email" => request()->email,
                "phone" => request()->phone,
            ]);
        }
        
        return redirect()->back()->with(['message' => 'Profile Updated Successfully', 'alert' => 'alert-success']);
    }

    public function edit_password()
    {
        return view("user.edit_password");
    }

    public function update_password(User $client)
    {
        request()->validate([ 'password'=>['required','min:8','string','confirmed'] ]);
        if(Hash::check(request()->old_password, $client->password))
        {
            $client->update(['password'=>password_hash(request()->password, PASSWORD_DEFAULT)]);
            return redirect()->back()->with(['message'=>'Password Updated Successfully','alert'=>'alert-success']);
        }
        else
        {
            return redirect()->back()->with(['message'=>'Please Enter the Correct Password','alert'=>'alert-danger']);
        }
        return redirect()->back()->with(['message' => 'Profile Updated Successfully', 'alert' => 'alert-success']);
    }

    public function edit_email()
    {
        return view("user.edit_email");
    }

    public function update_email(User $client)
    {
        $verification_code = Str::random(15);
        $client->update([ "verification_code" => Hash::make($verification_code)]);
        $this->mailCredentials( $client->email, $verification_code);
        $this->newEmail = request()->email;

        request()->validate(['email'=>['required','string','email','max:255','unique:users']]);
        return redirect()->back()->with(['message' => 'Email activation code was sent to the email you provided', 'alert' => 'alert-success']);
    }


    public function activate_email()
    {
        return view("user.activate_email");
    }

    //Needs refactoring
    public function activation_email()
    {
        if(Hash::check(request()->verification_code, $client->verification_code))
        {
            $client->update([ "email" => $this->newEmail]);
            return redirect()->back()->with(['message'=>'Email Activated','alert'=>'alert-success']);
        }
        else
        {
            return redirect()->back()->with(['message'=>'Activation code incorrect','alert'=>'alert-danger']);
        }
    }

    public function client_orders()
    {
        $this->storeUserId();
        $product = UserProduct::where("user_id", auth()->user()->id)->get();
        return view("user.orders")->with("product", $product);
    }

    public function product_checkout( UserProduct $user_product )
    {
        $new_price = Product::where("id", $user_product->product_id)->value("new_price");
        $total_price = $new_price * request()->quantity;

        Invoice::updateOrCreate( # Creating a new invoice
            ["user_id" => auth()->user()->id, "user_product_id" => $user_product->id, "status" => "pending"],
            ["user_id" => auth()->user()->id, "user_product_id" => $user_product->id]
        );

        $user_product->update([
            "quantity" => request()->quantity,
            "total_price" => $total_price
        ]);     
        return view("user.invoice")->with("user_product", $user_product);
    }

    private function storeUserId()
    {
        if(request()->session()->has("rand"))
        {
            $user_product_ids = UserProduct::where("guest_id", request()->session()->get("rand"))->pluck("id")->toArray();
            for($i=0; $i<count($user_product_ids); $i++)
            {
                $user_product = UserProduct::find($user_product_ids[$i]);
                $user_product->update(["user_id" => auth()->user()->id]);
            }
            
        }
    }


    private function mailCredentials($user_email, $verfication_code)
    {
      Mail::to( $user_email )->send( new EmailVerification( $verfication_code ));
    }
}
