<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Permission::withCount('roles');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');

        $allowedSorts = [
            'name',
            'slug',
            'created_at',
        ];

        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'created_at';
        }

        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'desc';
        }

        $permissions = $query
            ->orderBy($sortBy, $sortOrder)
            ->paginate(10)
            ->withQueryString();

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:permissions,name',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:permissions,slug',
            ],
        ]);

        // Generate slug if empty
        $slug = $validated['slug'] ?? null;

        if (!$slug) {
            $slug = Str::slug($validated['name']);
        }

        // Make slug unique
        $originalSlug = $slug;
        $counter = 1;

        while (Permission::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        Permission::create([
            'name' => $validated['name'],
            'slug' => $slug,
        ]);

        return redirect()
            ->route('admin.permissions.index')
            ->with('success', 'Permission created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = Permission::withCount('roles')->findOrFail($id);

        return view('admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = Permission::findOrFail($id);

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('permissions', 'name')
                    ->ignore($permission->id),
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('permissions', 'slug')
                    ->ignore($permission->id),
            ],
        ]);

        // Generate slug if empty
        $slug = $validated['slug'] ?? null;

        if (!$slug) {
            $slug = Str::slug($validated['name']);
        }

        // Make sure slug is unique
        $originalSlug = $slug;
        $counter = 1;

        while (
            Permission::where('slug', $slug)
                ->where('id', '!=', $permission->id)
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        $permission->update([
            'name' => $validated['name'],
            'slug' => $slug,
        ]);

        return redirect()
            ->route('admin.permissions.index')
            ->with('success', 'Permission updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id);

        // Prevent deleting permission if assigned to roles
        if ($permission->roles()->exists()) {
            return redirect()
                ->route('admin.permissions.index')
                ->with(
                    'error',
                    'This permission cannot be deleted because it is assigned to one or more roles.'
                );
        }

        $permission->delete();

        return redirect()
            ->route('admin.permissions.index')
            ->with('success', 'Permission deleted successfully.');
    }
}