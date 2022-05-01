<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('role-view');

        $roles = Role::all();
        return view('back-end.admin.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('role-create');

        $permission_parent = Permission::where('parent_id' , 0)->with('permission_child')->get();
        return view('back-end.admin.role.add',compact('permission_parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('role-create');


        $role = Role::create([
            'name' => $request->name
        ]);

        $role->permissions()->attach($request->permission_id);

        return redirect()->route('role.index');
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
        $role = Role::find($id);
        $this->authorize('role-update',$role);

        $permission_parent = Permission::where('parent_id' , 0)->with('permission_child')->get();
        $permission_checked = $role->permissions;
        return view('back-end.admin.role.edit',compact('role','permission_parent','permission_checked'));
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
        // dd($request->all());
        $role = Role::find($id);
        $this->authorize('role-update',$role);

        $role->update([
            'name' => $request->name,
        ]);

        $role->permissions()->sync($request->permission_id);
        return back()->with('success','Update roles successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id); 
        $this->authorize('role-delete',$role);

        $role->delete();
        // remove be longs to many permission_role table when roles is delete
        $role->permissions()->detach(); 
        return back();
    }
}
