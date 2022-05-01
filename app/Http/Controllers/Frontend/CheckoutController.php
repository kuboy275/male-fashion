<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
{
    public function view_checkout(){
        $carts = Cart::where('user_id',Auth::id())->with('products')->get();
       
        return view('front-end.layouts.checkout',compact('carts'));
    }

    public function post_checkout(CheckoutRequest $request){
        $carts = Cart::where('user_id',Auth::id())->with('products')->get();

        try {

            DB::beginTransaction();
            if(count($carts) > 0) {

                $customer = new Customer;
                $customer->first_name = $request->first_name;
                $customer->last_name = $request->last_name;
                $customer->email = $request->email;
                $customer->phone = $request->phone;
                $customer->country = $request->country;
                $customer->city = $request->city;
                $customer->address = $request->address;
                $customer->post_code = $request->post_code;
                $customer->user_id = Auth::id();
                $customer->save();
                if(Session::has('cart_total')){
        
                    $bill = new Bill;
                    $bill->customer_id = $customer->id;
                    $bill->date_order = date('Y-m-d H:i:s');
                    $bill->sub_total  = Session::get('cart_total.sub_total');
                    $bill->discount_type  = Session::get('cart_total.discount_type');
                    $bill->discount_value  = Session::get('cart_total.discount_value');
                    $bill->discount_price  = Session::get('cart_total.discount_price');
                    $bill->total  = Session::get('cart_total.total');
                    $bill->payment_method  = $request->payment_method;
                    $bill->order_state   = $request->order_state;
                    $bill->note   = $request->note;
                    $bill->save();
        
                        foreach ($carts as $key => $item) {
                            $bill_detail = new BillDetail;
                            $bill_detail->bill_id = $bill->id;
                            $bill_detail->product_name = $item->products->name;
                            $bill_detail->quantity = $item->product_qty;
                            $bill_detail->price = $item->products->price;
                            $bill_detail->save();
                    }
                }
            }else{
                return back()->with('error','Please add the product to the cart to place an order');
            }

            DB::commit();
            Session::forget('coupon');
            Session::forget('cart_total');
            Cart::where('user_id',Auth::id())->delete();
            return redirect('thanks');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message:' . $e->getMessage() . 'Line : ' . $e->getLine());
            return back()->with('error',$e->getMessage());
        }   

    }
}
