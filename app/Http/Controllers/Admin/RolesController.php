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

    public function show(Request $request)
    {
        $query = Role::query();
        if ($request->id) {
            $query->where('id', $request->id);
        }
        if ($request->name) {
            $query->orWhere('name', $request->name);
        }
        $permissions = Permission::paginate(20);
        $roles = $query->paginate(20);
        return view('admin.roles.roles', compact('roles', 'permissions'));
    }

    public function destroy(Request $request)
    {
        Role::whereIn('id', explode('_', $request->role_ids))->delete();
        return back()->with('success', 'Success to delete');
    }

    public function update(Request $request, Role $role)
    {
        $role->update([
            'name' => $request->name
        ]);
        foreach ($role->permissions as $permission) {
            $role->revokePermissionTo($permission);
        }
        foreach ($request->permissions as $permission) {
            $role->givePermissionTo($permission);
        }

        return back()->with('success', 'You have updated the info!');
    }
}
