<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return redirect()->route('role.permission.list');
    }

    public function create()
    {
        return view('role-permission.role-form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'status' => 'required|in:0,1',
        ]);

        Role::create([
            'name' => $validated['name'],
            'status' => $validated['status'] ? 'Active' : 'Inactive',
            'guard_name' => 'web',
        ]);

        return redirect()->route('role.permission.list')->with('success', 'Role created successfully.');
    }

    public function show($id)
    {
        return redirect()->route('role.edit', $id);
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('role-permission.role-form', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,'.$role->id,
            'status' => 'required|in:0,1',
        ]);

        $role->update([
            'name' => $validated['name'],
            'status' => $validated['status'] ? 'Active' : 'Inactive',
        ]);

        return redirect()->route('role.permission.list')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('role.permission.list')->with('success', 'Role deleted successfully.');
    }
}
