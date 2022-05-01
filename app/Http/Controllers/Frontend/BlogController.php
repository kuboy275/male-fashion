<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    
    public function index(){

        $blogs = Blog::latest()->paginate(5);
        return view('front-end.layouts.blog',compact('blogs'));

    }

    public function detail($slug){
        $blog = Blog::where('slug',$slug)->first();
        $blog_next =  Blog::where('id', '>' , $blog->id)->first();
        $blog_previous =  Blog::where('id', '<' , $blog->id)->first();
        return view('front-end.layouts.blog-details',compact('blog','blog_next','blog_previous'));
    }

}
