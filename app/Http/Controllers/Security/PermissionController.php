<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return redirect()->route('role.permission.list');
    }

    public function create()
    {
        return view('role-permission.permission-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name',
        ]);

        Permission::create(['name' => $validated['name'], 'guard_name' => 'web']);

        return redirect()->route('role.permission.list')->with('success', 'Permission created successfully.');
    }

    public function show($id)
    {
        return redirect()->route('permission.edit', $id);
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('role-permission.permission-form', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,'.$permission->id,
        ]);

        $permission->update(['name' => $validated['name']]);

        return redirect()->route('role.permission.list')->with('success', 'Permission updated successfully.');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('role.permission.list')->with('success', 'Permission deleted successfully.');
    }
}
