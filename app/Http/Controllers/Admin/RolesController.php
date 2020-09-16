<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions')->paginate(20);
        $permissions = Permission::paginate(20);
        return view('admin.roles.roles', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name
        ]);
        foreach ($request->permissions as $permission) {
            $role->givePermissionTo($permission);
        }

        return back()->with('success', 'You have created a role!');
    }
}