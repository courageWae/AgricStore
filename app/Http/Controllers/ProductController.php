<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function fertilizer()
    {
        return view('BigStore.fertilizers')->with(["fertilizers" => Product::Fertilizer()->get(), "popular_fertilizer" => $this->popularFertilizerProducts()]);
    }

    public function equipment()
    {
        return view('BigStore.equipments')->with(["equipments" => Product::Equipment()->get(), "popular_equipment" => $this->popularEquipmentProducts()]);
    }
    
    public function foodStuff()
    {
        return view('BigStore.foodStuffs')->with(["food_stuffs" => Product::FoodStuff()->get(), "popular_foodStuff" => $this->popularFoodStuffProducts()]);
    }

    

    public function add_product()
    {
        if( request()->isMethod("post") && request()->hasFile("photo") )
        {
            request()->validate([ # validate incoming request
                'product_name' => ['required', 'string', 'max:255'],
                'photo' => ['mimes : jpeg,jpg,png', 'image'],
                'price' => ['numeric'],
                'new_price' => ['nullable'],
                'weight' => ['required', 'numeric'],
                'discount' => ['nullable', 'numeric'],
                'category' => ['required']
            ]);

            $category_id = Category::where("name", request()->category)->value("id"); # get category id.
            $path = request()->file("photo")->store('product', 'public'); # store in public folder in the product directory
            
            #caluclating discount.
            $discount = ( request()->discount / 100 ) * request()->price;
            $new_price = request()->price - $discount ;
            $product = new Product([  # create new instance 
                "product_name" => request()->product_name,
                "price" => request()->price,
                "new_price" => $new_price,
                "weight" => request()->weight,
                "category_id" => $category_id,
                "discount" => request()->discount,
                'photo' => $path 
            ]);
            $product->save();
              
            return redirect()->back()->with(['message' => 'New Product Created Successfully', 'alert' => 'alert-success']);
        }
        else
        {
            return view("admin.productAdd");
        }
    }

    public function product_list()
    {
        return view("admin.productList")->with("product", Product::get());
    }

    public function product_edit( Product $product )
    {
        return view("admin.edit_product")->with("product", $product);
    }

    public function product_update( Product $product )
    {  
        request()->validate([ # validate incoming request
            'product_name' => ['required', 'string', 'max:255'],
            'price' => ['numeric'],
            'weight' => ['required', 'numeric'],
            'discount' => ['nullable', 'numeric'],
            'category' => ['required']
        ]);

        $category_id = Category::where("name", request()->category)->value("id"); # get category id.
    
        $product->update([
            "product_name" => request()->product_name,
            "price" => request()->price,
            "weight" => request()->weight,
            "category_id" => $category_id,
            "discount" => request()->discount,
        ]);

        if( request()->hasFile("photo") )
        {
            request()->validate( ['photo' => ['mimes : jpeg,jpg,png', 'image'],] );
            $path = request()->file("photo")->store('product', 'public'); # store in public folder in the product directory
            $product->update([ "photo" => $path]);
        }
              
        return redirect()->back()->with(['message' => 'Product Updated Successfully', 'alert' => 'alert-success']); 
    }

    public function product_delete( Product $product)
    {
        $product->delete();
        return redirect()->back();
    }




    private function popularEquipmentProducts()
    {
        $product = Product::Equipment()->where("clicks", ">", 5)->take(5)->get();
        return $product;
    }

    private function popularFertilizerProducts()
    {
        $product = Product::Fertilizer()->where("clicks", ">", 5)->take(5)->get();
        return $product;
    }

    private function popularFoodStuffProducts()
    {
        $product = Product::FoodStuff()->where("clicks", ">", 5)->take(5)->get();
        return $product;
    }
}
