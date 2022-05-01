<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Http\Requests\Coupon\CouponRequest;
use App\Traits\DeleteModelTrait;
class CouponController extends Controller
{
    use DeleteModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('coupon-view');

        $coupons = Coupon::latest()->paginate(10);
        return view('back-end.admin.coupon.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('coupon-create');
        return view('back-end.admin.coupon.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        $this->authorize('coupon-create');

        $data = [
            'name' => $request->name,
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'quantity' => $request->quantity,
            'starts_at' => $request->starts_at,
            'expires_at' => $request->expires_at
        ];

        Coupon::create($data);
        return redirect()->route('coupon.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = Coupon::find($id);
        return view('back-end.admin.coupon.show',compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        $this->authorize('coupon-update',$coupon);

        return view('back-end.admin.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, $id)
    {
        $coupon = Coupon::find($id);
        $this->authorize('coupon-update',$coupon);


        $data = [
            'name' => $request->name,
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'quantity' => $request->quantity,
            'starts_at' => $request->starts_at,
            'expires_at' => $request->expires_at
        ];
        $coupon->update($data);
        return back()->with('success','Coupon updates successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return  $this->deleteModel($id, Coupon::class,'coupon-delete');
    }
}
