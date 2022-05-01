<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::where('name','Super Admin')->first();
        $permission = Permission::where('parent_id','<>', 0 )->get();
        $per_id = [];
        foreach ($permission as $key => $value) {
            $per_id[] = $value->id;
        }
        $super_admin->permissions()->sync($per_id);


        // $developers = Role::where('name','Developers')->first();
        // $developers->permissions()->sync([1,2]);

        // $users = Role::where('name','Users')->first();
        // $users->permissions()->sync([1]);
    }
}
