<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::paginate(20);
        return view('admin.permissions.permissions', compact('permissions'));
    }

    public function store(Request $request)
    {
        Permission::create(['name' => $request->name]);
        return back()->with('success', 'You have created a new permission!');
    }

    public function destroy(Request $request)
    {
        Permission::whereIn('id', explode('_', $request->permission_ids))->delete();
        return back()->with('success', 'Success to delete');
    }

    public function show(Request $request)
    {
        dd(111);
        $permissions = Permission::where('id', $request->id)->paginate(20);
        return view('admin.permissions.permissions', compact('permissions'));
    }
}
