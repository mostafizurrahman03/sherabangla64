<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::with('role');

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone_no', 'like', "%{$search}%");

            });
        }


        /*
        |--------------------------------------------------------------------------
        | Role Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('role_id')) {

            $query->where(
                'role_id',
                $request->role_id
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if ($request->has('status') && $request->status !== '') {

            $query->where(
                'is_active',
                (int) $request->status
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Sorting
        |--------------------------------------------------------------------------
        */

        $allowedSorts = [
            'created_at',
            'name',
            'email',
        ];

        $sortBy = $request->get(
            'sort_by',
            'created_at'
        );

        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'created_at';
        }

        $sortDirection =
            $sortBy === 'name'
                ? 'asc'
                : 'desc';


        $query->orderBy(
            $sortBy,
            $sortDirection
        );


        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $users = $query
            ->paginate(15)
            ->withQueryString();


        /*
        |--------------------------------------------------------------------------
        | Roles
        |--------------------------------------------------------------------------
        */

        $roles = Role::where('is_active', true)
            ->orderBy('name')
            ->get();


        return view(
            'admin.users.index',
            compact(
                'users',
                'roles'
            )
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.users.create',
            compact('roles')
        );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'phone_no' => [
                'nullable',
                'string',
                'max:30',
            ],

            'role_id' => [
                'required',
                'integer',
                'exists:roles,id',
            ],

            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Image Upload
        |--------------------------------------------------------------------------
        */

        $imagePath = null;

        if ($request->hasFile('image')) {

            $imagePath = $request
                ->file('image')
                ->store(
                    'users',
                    'public'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Create User
        |--------------------------------------------------------------------------
        */

        User::create([

            'name' =>
                $validated['name'],

            'email' =>
                $validated['email'],

            'phone_no' =>
                $validated['phone_no'] ?? null,

            'password' =>
                $validated['password'],

            'role_id' =>
                $validated['role_id'],

            'image' =>
                $imagePath,

            'is_active' =>
                $request->boolean('is_active'),

        ]);


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User created successfully.'
            );
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with('role')
            ->findOrFail($id);

        return view(
            'admin.users.show',
            compact('user')
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        $roles = Role::where('is_active', true)
            ->orderBy('name')
            ->get();

        /*
        | Current user's role may be inactive.
        | Include it so edit form doesn't lose selection.
        */

        if (
            $user->role_id &&
            !$roles->contains('id', $user->role_id)
        ) {

            $currentRole = Role::find(
                $user->role_id
            );

            if ($currentRole) {

                $roles->push($currentRole);

            }
        }


        return view(
            'admin.users.edit',
            compact(
                'user',
                'roles'
            )
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        string $id
    ) {

        $user = User::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique(
                    'users',
                    'email'
                )->ignore($user->id),
            ],

            'phone_no' => [
                'nullable',
                'string',
                'max:30',
            ],

            'role_id' => [
                'required',
                'integer',
                'exists:roles,id',
            ],

            'password' => [
                'nullable',
                'string',
                'min:8',
                'confirmed',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Existing Image
        |--------------------------------------------------------------------------
        */

        $imagePath = $user->image;


        /*
        |--------------------------------------------------------------------------
        | New Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('image')) {

            /*
            | Delete old image
            */

            if (
                $user->image &&
                Storage::disk('public')->exists(
                    $user->image
                )
            ) {

                Storage::disk('public')->delete(
                    $user->image
                );
            }


            /*
            | Store new image
            */

            $imagePath = $request
                ->file('image')
                ->store(
                    'users',
                    'public'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Update Data
        |--------------------------------------------------------------------------
        */

        $data = [

            'name' =>
                $validated['name'],

            'email' =>
                $validated['email'],

            'phone_no' =>
                $validated['phone_no'] ?? null,

            'role_id' =>
                $validated['role_id'],

            'image' =>
                $imagePath,

            'is_active' =>
                $request->boolean('is_active'),

        ];


        /*
        |--------------------------------------------------------------------------
        | Update Password Only If Entered
        |--------------------------------------------------------------------------
        */

        if (
            !empty($validated['password'])
        ) {

            $data['password'] =
                $validated['password'];

        }


        /*
        |--------------------------------------------------------------------------
        | Save
        |--------------------------------------------------------------------------
        */

        $user->update($data);


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User updated successfully.'
            );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Prevent deleting yourself
        |--------------------------------------------------------------------------
        */

        if (
            Auth::check() &&
            Auth::id() == $user->id
        ) {

            return redirect()
                ->route('admin.users.index')
                ->with(
                    'error',
                    'You cannot delete your own account.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Image
        |--------------------------------------------------------------------------
        */

        if (
            $user->image &&
            Storage::disk('public')->exists(
                $user->image
            )
        ) {

            Storage::disk('public')->delete(
                $user->image
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Soft Delete
        |--------------------------------------------------------------------------
        */

        $user->delete();


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User deleted successfully.'
            );
    }
}