<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CartRequest;
use Validator;
use DateTime;

class CartController extends Controller
{

    public function view_cart(){
        $carts = Cart::where('user_id',Auth::id())->with('products')->get();

        if($carts->count() < 1){
            Session::forget('cart_total');
        }

        /*  
            This code below working good, but i has no way to make it work on the all front-end page. 
            So I will keep it here and find way :))
            This code creating session cart and working only cart page.
        */

        // $cart_session = [];
        // $cart_session['subTotalPrice'] = 0;
        // $cart_session['total_qty'] = 0;
        // $cart_session['discount_type'] = null;
        // $cart_session['discount_value'] = null;
        // $cart_session['discount_price'] = null;
        // $cart_session['total'] = 0;



        // foreach ($carts as $key => $cartItem) {
        //     $cart_session['subTotalPrice'] += $cartItem->products->price * $cartItem->product_qty;
        //     $cart_session['total_qty']  += $cartItem->product_qty;
        //     $cart_session['item'][] = $cartItem->products;
        //     $cart_session['item'][$key]['qty'] = $cartItem->product_qty; /* Push Attributes 'qty' to item array */ 
        // };

        // if (Session::has('coupon')){
        //     $coupon = Session::get('coupon');
        //     $cart_session['discount_type'] = $coupon->type;
        //     $cart_session['discount_value'] = $coupon->value;

        //     // dd($coupon->type);

        //     if($coupon->type == 'fixed'){
        //         $cart_session['discount_price'] = $cart_session['discount_value'];
        //     } elseif($coupon->type == 'percent'){
        //         $cart_session['discount_price'] =  $cart_session['subTotalPrice'] * $cart_session['discount_value'] / 100 ;
        //     }

        // }

        // $cart_session['total'] =  $cart_session['subTotalPrice'] - $cart_session['discount_price'];
        
        // Session::put('cart',$cart_session);

        return view('front-end.layouts.shopping-cart',compact('carts'));
    }


    public function apply_coupon(Request $request) {

        $carts = Cart::where('user_id',Auth::id())->with('products')->get();

        if (count($carts) == 0) {
            return back()->with('error','Vui lòng thêm sản phẩm vào giỏ hàng');
        }


        $coupon_code = $request->coupon;
        $coupon = Coupon::where('code',$coupon_code)->first();

        if($coupon){
            $date_now = date('Y-m-d H:i:s');
            $date_start = $coupon->starts_at->format('Y-m-d H:i:s');
            $date_expires = $coupon->expires_at->format('Y-m-d H:i:s');

            if ($date_now < $date_start) {
                return back()->with('error','Code chưa đến ngày sử dụng');
            } else if ($date_now >= $date_expires){
                return back()->with('error','Code đã hết hạn sử dụng');
            } else {

                if ( $coupon->quantity > 0 ) {
                    
                    Session::put('coupon',$coupon);
                    $coupon->update(array('quantity' => $coupon->quantity - 1));
                    return back()->with('success','Apply Coupon Code Success!');

                } else {
                    return back()->with('error','Coupon code is out of stock');
                }

            }

        }else{
            return back()->with('error','Coupon code does not exist, please enter the correct code!');
        }
    }

    public function remove_coupon(){
        Session::forget('coupon');
        return back()->with('success','Remove Discount Code Success!');
    }

    public function add_product(CartRequest $request){

        $product_id = $request->product_id;
        $product_qty = $request->product_qty;
        $user_id = Auth::id();

        if(Auth::check()){
            $product_check = Product::where('id',$product_id)->first();
            //  exists() : Check xem bản ghi đã có trong db hay chưa ->  true or  false
            $cart_check =  Cart::where('product_id',$product_id)->where('user_id', $user_id)->exists();
            if($cart_check) {

                return response()->json([
                    'code' => 208,
                    'status' => $product_check->name." Already in cart"
                ]);

            } else {
                $data_cart = [
                    'user_id' =>  $user_id,
                    'product_id' => $product_id,
                    'product_qty' => $product_qty
                ];

                Cart::create($data_cart);
                return response()->json([
                    'code' => 201,
                    'status' => $product_check->name." Added to cart "
                ]);
            }
        }
    }


    public function update_cart_item(CartRequest $request){

        $product_id = $request->product_id;
        $product_qty = $request->product_qty;
        
        if(Auth::check()){

            $cart_check = Cart::where('product_id',$product_id)->where('user_id', Auth::id())->exists();

            if($cart_check){

                $cartItem = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cartItem->product_qty = $product_qty;
                $cartItem->update();
                return response()->json([
                    'code' => 200,
                    'status' => 'Update successfully'
                ]);
            }
        }
    }

    public function delete_cart_item(Request $request){

        if(Auth::check()){

            $product_id = $request->product_id;
            $cart_check = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists();

            if($cart_check){

                $cart_item = Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                $cart_item->delete();
                return response()->json([
                    'code' => 200,
                    'status' => 'Product deleted successfully'
                ]);

            }

        }
    }


}
