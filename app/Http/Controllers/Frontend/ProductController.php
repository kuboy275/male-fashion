<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    
    public function all_product(){
        $products = Product::latest()->paginate(9);
        return view('front-end.layouts.shop',compact('products'));
    }

    public function product_detail($slug){
        $product = Product::with('tags','images','category')->where('slug',$slug)->first();
        $product_related = Product::where('id', '!=' ,$product->id)->where('category_id',$product->category->id)->latest()->paginate(4);
        return view('front-end.layouts.shop-details',compact('product','product_related'));
    }

    public function by_category($slug)
    {
        $category = Category::where('slug',$slug)->first();
        $products = Product::where('category_id',$category->id)->latest()->paginate(9);
        return view('front-end.layouts.shop',compact('products'));
    }


    
    public function show_category_product()
    {
        $category = Category::all();
        $product = Product::all();
        return view('show-category-product',compact('category','product'));
    }
}
