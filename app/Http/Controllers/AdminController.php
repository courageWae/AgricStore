<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin', 'auth']) ;
    }

    public function index()
    {
        return view("admin.dashboard");
    }

    public function profile()
    {
        return view("admin.profile");
    }

    public function update_profile( User $admin )
    {
        if( request()->hasFile("photo"))
        {
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'user_name' => ['required', 'string', 'min:5', 'max:10'],
                'phone' => ['required', 'numeric', 'min:10'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'photo' => ['mimes : jpeg,jpg,png', 'image'],
            ]);

            $path = request()->file("photo")->store('user/admin', 'public'); # store in public folder in the product directory


            $admin->update( request()->all() );
            $admin->update([
                "alias" => Str::of(request()->name." ". request()->user_name)->slug("-"),
                "password" => Hash::make( request()->password ),
                "photo" => $path
                ]);
        }
        else 
        {
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'user_name' => ['required', 'string', 'min:5', 'max:10'],
                'phone' => ['required', 'numeric', 'min:10'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
    
            $admin->update( request()->all() );
            $admin->update([ "alias" => Str::of(request()->name." ". request()->user_name)->slug("-"), "password" => Hash::make( request()->password ) ]);

        }
              
        return redirect()->back();
    }

    public function add_admin()
    {
        if( request()->isMethod("post") )
        {
            request()->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'user_name' => ['required', 'string', 'min:5', 'max:10', 'unique:users'],
                'phone' => ['required', 'numeric', 'min:10'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
    
            $admin = User::create( request()->all() );
            $admin->update([ "alias" => Str::of(request()->name." ". request()->user_name)->slug("-"), "password" => Hash::make( request()->password ) ]);
            
            return redirect()->back()->with(['message' => ' Administrator Created Successfully', 'alert' => 'alert-success']);
        }
        else
        {
            return view("admin.adminAdd");
        }
    }

    public function admin_list()
    {
        return view("admin.adminList")->with("admin", User::Admin());
    }

    public function admin_view( User $admin )
    {
        return view("admin.view_admin")->with("admin", $admin);
    }

    public function admin_delete( User $admin)
    {
        $admin->delete();
        return redirect()->back();
    }

    public function user_list()
    {
        return view("admin.userList")->with("client", User::Client());
    }

    public function client_delete( User $client)
    {
        $client->delete();
        return redirect()->back();
    }

    

    

}
