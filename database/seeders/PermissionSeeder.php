<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // => This code below is used to insert data configured (path: config/permission.php) into permission table 

        //B1: insert all name parent permission 

        foreach (config('permissions.permission_parent_name') as $key_parent => $per_parent) {
            $per_parent_create = Permission::create([
                'name' => $per_parent,
                'parent_id' => 0
            ]);
            //B2: insert children permissions follow by parent permission id from B1
            foreach (config('permissions.permission_chil_name') as $per_child) {
                Permission::create([
                    'name' => Str::of($key_parent. " " .$per_child)->title(), // UpperCase First Letter
                    'key_name' => $key_parent. "_" . $per_child,
                    'parent_id' => $per_parent_create->id
                ]);
            }

        };


        /* 
            RESULT EXAMPLE : id => 1, name => Module Category , parent_id = 0, 
                             id => 2 , name => Category List, parent_id = 1   
                             id => 2 , name => Category Create, parent_id = 1   
                             id => 3 , name => Category Update, parent_id = 1   
                             id => 4 , name => Category Delete, parent_id = 1   
                             id => 5, name => Module Product , parent_id = 0
                             id => 6 , name => Product List, parent_id = 5   
                             ...
        */

    }
}
