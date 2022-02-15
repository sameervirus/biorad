<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Roles/Index', [
            'filters' => Request::all('search'),
            'roles' => Roles::orderByName()
                ->filter(Request::only('search'))
                ->get()
                ->transform(fn ($role) => [
                    'id' => $role->id,
                    'name' => $role->name,
                    'role_permissions' => $role->permissions 
                ]),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Roles/Create', ['permissions' => Permission::all()]);
    }

    public function store()
    {
        Request::validate([
            'name' => ['required', 'max:50'],
            'items' => ['nullable'],
        ]);

        $role = Role::create([
            'name' => Request::get('name')
        ]);

        if($role && count(Request::get('items')) != 0) {
            $role->givePermissionTo(Request::get('items'));
        }

        return Redirect::route('roles.index')->with('success', 'Role created.');
    }

    public function edit(Role $role)
    {
        return Inertia::render('Admin/Roles/Edit', [
            'role' => [
                'id' => $role->id,
                'name' => $role->name,
                'role_permissions' => $role->permissions->pluck('id'),
            ],
            'permissions' => Permission::all(),
        ]);
    }

    public function update(Role $role)
    {
        Request::validate([
            'name' => ['required', 'max:50'],
            'items' => ['nullable'],
        ]);

        $role->update(Request::only('name'));

        $role->syncPermissions(Request::get('items'));

        return Redirect::route('roles.index')->with('success', 'Role updated.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return Redirect::route('roles.index')->with('success', 'Role deleted.');
    }
}
