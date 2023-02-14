<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
  public function index()
  {
    $permissions = Permission::all();
    return view('admin.permissions.index', compact('permissions'));
  }

  public function create()
  {
    return view('admin.permissions.create');
  }

  public function store(Request $request)
  {
    $validated = $request->validate(['name' => 'required|unique:permissions']);
    Permission::create($validated);

    return to_route('admin.permissions.index')->with('message', 'Permission Created Successfully.');
  }

  public function edit(Permission $permission)
  {
    $roles = Role::all();
    return view('admin.permissions.edit', compact('permission', 'roles'));
  }

  public function update(Request $request, Permission $permission)
  {
    $validated = $request->validate(['name' => 'required']);
    $permission->update($validated);

    return to_route('admin.permissions.index')->with('message', 'Permission Updated Successfully.');
  }

  public function destroy(Permission $permission)
  {
    $permission->delete();

    return back()->with('message', 'Permission Deleted.');
  }

  public function assignRole(Request $request, Permission $permission)
  {
    if($permission->hasRole($request->role)){
      return back()->with('message', 'Role has been Exists.');
    }

    $permission->assignRole($request->role);
    return back()->with('message', 'Role Assign.');
  }

  public function removeRole(Permission $permission, Role $role)
  {
    if($permission->hasRole($role)){
      $permission->removeRole($role);
      return back()->with('message', 'Role Removed.');
    }

    return back()->with('message', 'Role not Exists.');
  }
}
