<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Users/Index', [
            'filters' => Request::all('search', 'role', 'trashed'),
            'roles' => Role::all(),
            'users' => User::orderByName()
                ->filter(Request::only('search', 'role', 'trashed'))
                ->get()
                ->transform(fn ($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'phone' => $user->phone,
                    'city' => $user->city,
                    'country' => $user->country,
                    'address' => $user->address,
                    'photo' => $user->photo_path ? URL::route('image', ['path' => $user->photo_path, 'w' => 40, 'h' => 40, 'fit' => 'crop']) : null,
                    'deleted_at' => $user->deleted_at,
                    'role' => $user->roles->first(),
                ]),
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Users/Create', ['roles' => Role::all()]);
    }

    public function store()
    {
        Request::validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email', Rule::unique('users')],
            'password' => ['nullable'],
            'phone' => ['nullable'],
            'city' => ['nullable'],
            'country' => ['nullable'],
            'address' => ['nullable'],
            'role' => ['nullable'],
            'photo' => ['nullable', 'image'],
        ]);

        $user = User::create([
            'first_name' => Request::get('first_name'),
            'last_name' => Request::get('last_name'),
            'email' => Request::get('email'),
            'password' => Request::get('password'),
            'phone' => Request::get('phone'),
            'city' => Request::get('city'),
            'country' => Request::get('country'),
            'address' => Request::get('address'),
            'photo_path' => Request::file('photo') ? Request::file('photo')->store('users') : null,
        ]);

        if($user && Request::get('role') != 0) {
            $user->assignRole(Request::get('role'));
        }

        return Redirect::route('users')->with('success', 'User created.');
    }

    public function edit(User $user)
    {
        return Inertia::render('Admin/Users/Edit', [
            'user' => [
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'phone' => $user->phone,
                'city' => $user->city,
                'country' => $user->country,
                'address' => $user->address,
                'role' => $user->roles->first(),
                'photo' => $user->photo_path ? URL::route('image', ['path' => $user->photo_path, 'w' => 60, 'h' => 60, 'fit' => 'crop']) : null,
                'deleted_at' => $user->deleted_at,
            ],
            'roles' => Role::all(),
        ]);
    }

    public function update(User $user)
    {
        Request::validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email', Rule::unique('users')->ignore($user->id)],
            'password' => ['nullable'],
            'phone' => ['nullable'],
            'city' => ['nullable'],
            'country' => ['nullable'],
            'address' => ['nullable'],
            'role' => ['nullable'],
            'photo' => ['nullable', 'image'],
        ]);

        $user->update(Request::only('first_name', 'last_name', 'email', 'phone', 'city', 'country', 'address'));

        if (Request::file('photo')) {
            $user->update(['photo_path' => Request::file('photo')->store('users')]);
        }

        if (Request::get('password')) {
            $user->update(['password' => Request::get('password')]);
        }

        if (Request::get('role') && Request::get('role') !== 0) {
            $user->syncRoles(Request::get('role'));
        }

        return Redirect::route('users')->with('success', 'User updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return Redirect::route('users')->with('success', 'User deleted.');
    }

    public function restore(User $user)
    {
        $user->restore();

        return Redirect::route('users')->with('success', 'User restored.');
    }
}
