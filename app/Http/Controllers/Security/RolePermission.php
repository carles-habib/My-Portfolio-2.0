<?php

namespace App\Http\Controllers\Security;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermission extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::orderBy('name')->get();
        $permissions = Permission::orderBy('name')->get();

        return view('role-permission.permissions', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        $checked = $request->input('permission', []);

        $roles = Role::all();

        foreach ($roles as $role) {
            $permissionsForRole = [];

            foreach ($checked as $permissionName => $roleNames) {
                if (in_array($role->name, $roleNames)) {
                    $permissionsForRole[] = $permissionName;
                }
            }

            $role->syncPermissions($permissionsForRole);
        }

        return redirect()->route('role.permission.list')->with('success', 'Role permissions updated successfully.');
    }
}
