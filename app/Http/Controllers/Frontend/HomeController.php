<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    
    public function index(){

        $sliders = Slider::latest()->take(3)->get();
        $blogs = Blog::latest()->take(3)->get();
        $categories = Category::latest()->with('products')->take(3)->get();
        $products = Product::latest()->take(8)->get();

        return view('front-end.layouts.home',compact('sliders','blogs','categories','products'));
    }

}
