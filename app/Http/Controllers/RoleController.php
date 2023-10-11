<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        $permissions = Permission::all();
        $roles = Role::all();
        $users = User::has('roles')->get();
        return view('dashboard.role_management.index',[
            'permissions' => $permissions,
            'roles' => $roles,
            'users' => $users,
        ]);
    }
    public function permission_store(Request $request){

        $permission = Permission::create(['name' => $request->permission_name]);

        return back();
    }
    public function role_store(Request $request){

        $role = Role::create(['name' =>  $request->role_name]);
        $role->givePermissionTo($request->permission_id);

        return back();
    }

    public function role_delete($id){

        Role::find($id)->delete();

        return back();
    }

    public function assign_role(Request $request){

        $user = User::find($request->user_id);

        $user->assignRole($request->role_id);

        return back();
    }
}
