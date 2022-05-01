<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\User;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(){
        
        $count_order = Bill::count();
        $count_user = User::where('is_admin','guest')->count();
        $count_product = Product::count();
        
        $order_new = Bill::where('order_state', config('order_state.order_state.0'))->get();
        $product_new = Product::latest()->paginate(5);

        $data_compact = [
            'count_order', 'count_user', 'count_product', 'order_new', 'product_new'
        ];

        return view('back-end.home', compact($data_compact));
    }
}
