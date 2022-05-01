<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Traits\DeleteModelTrait;
use App\Models\Bill;
use App\Models\BillDetail;

class OderManagementController extends Controller
{
    use DeleteModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('order-view');

        $bills = Bill::latest()->paginate(10);
        return view('back-end.admin.order.index',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bill::find($id);
        $this->authorize('order-view');
        
        $bill_detail = BillDetail::where('bill_id',$bill->id)->latest()->get();
        return view('back-end.admin.order.show',compact('bill','bill_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = Bill::find($id);
        $this->authorize('order-update',$bill);

        $bill_detail = BillDetail::where('bill_id',$bill->id)->latest()->get();
        return view('back-end.admin.order.edit',compact('bill','bill_detail')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bill = Bill::find($id) ;
        $this->authorize('order-update',$bill);

        $data = [
            'order_state' => $request->order_state
        ];
        $bill->update($data);
        return back()->with('success','Update order state successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        return  $this->deleteModel($id, Bill::class,'order-delete');
    }
}
