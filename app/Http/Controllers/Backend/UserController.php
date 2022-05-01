<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Traits\DeleteModelTrait;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{
    use DeleteModelTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('user-view');

        $users = User::where('is_admin', '<>' , 'guest')->where('is_admin','<>', 'admin')->get();
        return view('back-end.admin.user.index',compact('users'));
    }   


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('user-create');

        $roles = Role::where('name','<>','Super Admin')->get();
        return view('back-end.admin.user.add',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterRequest $request)
    {
        $this->authorize('user-create');
        
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone, 
            'role_id' => $request->role_id,
            'is_admin' => 'user',
            'password' =>Hash::make($request->password)
        ];

        //  Not Create Account with Permission Admin ( == 1)
        if($request->role_id == 1){
            abort(403);
        }else{
            User::create($data);
        }

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::find($id);
        $this->authorize('user-update',$user);

        $roles = Role::where('name','<>','Super Admin')->get();
        return view('back-end.admin.user.edit',compact('roles','user'));
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
        $user = User::find($id);
        $this->authorize('user-update',$user);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone, 
            'role_id' => $request->role_id,
            'is_admin' => 'user',
            'password' =>Hash::make($request->password)
        ];

        //  Not Update Account with Permission Admin ( == 1)
        if($request->role_id == 1){
            abort(403);
        }else{
            $user->update($data);
        }
        return back()->with('success','User updates the data successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        return  $this->deleteModel($id, User::class,'user-delete');
    }
}
