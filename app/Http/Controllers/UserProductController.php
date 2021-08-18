<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UserProduct;
use Illuminate\Support\Str;
use App\Models\Guest;
class UserProductController extends Controller
{
    public function store()
    {
        Product::where('id', request()->product_id)->increment('clicks', 1);


        if(request()->session()->missing("rand")) session(["rand" => Str::random(10)]);

        if( !Guest::where('guest_id', session()->get("rand"))->exists()) Guest::create([ 'guest_id' => session()->get("rand") ]);
        $product = Product::find(request()->product_id);
        
        if( !UserProduct::where('product_id', request()->product_id)->where("guest_id", session()->get("rand"))->exists())
        {
            $product = new UserProduct([
                "product_name" => $product->product_name,
                "price" => $product->price,
                "weight" => $product->weight,
                "discount" => $product->discount,
                "photo" => $product->photo,
                "category_id" => $product->category_id,
                "product_id" => $product->id,
                "user_id" => auth()->user()->id ?? "vistor",
                "guest_id" => session()->get("rand"),
            ]);
            $product->save();
        }
        
        session(["status" => request()->product_id]);
        return redirect()->back();
    }

    public function destroy( UserProduct $user_product)
    {
        $user_product->delete();
        return redirect()->back();  
    }
}
