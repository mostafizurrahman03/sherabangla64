<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Policy::with('user');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('is_active', $request->status);
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');

        $allowedSorts = [
            'created_at',
            'title',
            'sort_order',
            'published_at',
        ];

        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'created_at';
        }

        $query->orderBy($sortBy, 'desc');

        $policies = $query->paginate(10)->withQueryString();

        return view('admin.policies.index', compact('policies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.policies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:policies,slug',
            'description' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        // Generate slug automatically
        $validated['slug'] = $validated['slug']
            ?? Str::slug($validated['title']);

        // Ensure unique slug
        $originalSlug = $validated['slug'];
        $counter = 1;

        while (Policy::where('slug', $validated['slug'])->exists()) {
            $validated['slug'] = $originalSlug . '-' . $counter;
            $counter++;
        }

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active');

        Policy::create($validated);

        return redirect()
            ->route('admin.policies.index')
            ->with('success', 'Policy created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $policy = Policy::with('user')->findOrFail($id);

        return view('admin.policies.show', compact('policy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $policy = Policy::findOrFail($id);

        return view('admin.policies.edit', compact('policy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $policy = Policy::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:policies,slug,' . $policy->id,
            'description' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'published_at' => 'nullable|date',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        // Generate slug if empty
        $validated['slug'] = $validated['slug']
            ?? Str::slug($validated['title']);

        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active');

        $policy->update($validated);

        return redirect()
            ->route('admin.policies.index')
            ->with('success', 'Policy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $policy = Policy::findOrFail($id);

        $policy->delete();

        return redirect()
            ->route('admin.policies.index')
            ->with('success', 'Policy deleted successfully.');
    }
}