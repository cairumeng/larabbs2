<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::paginate(20);

        if ($request->wantsJson()) {
            return view('admin.roles.roles', compact('permissions'));
        }
    }
}
