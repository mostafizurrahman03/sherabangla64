<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Category::query()
            ->with('user')
            ->withCount('products');

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if ($request->has('status') && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        /*
        |--------------------------------------------------------------------------
        | Sorting
        |--------------------------------------------------------------------------
        */

        $sortBy = $request->get('sort_by', 'created_at');

        $allowedSorts = [
            'created_at',
            'name',
            'sort_order',
        ];

        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'created_at';
        }

        if ($sortBy === 'name') {
            $query->orderBy('name', 'asc');
        } elseif ($sortBy === 'sort_order') {
            $query->orderBy('sort_order', 'asc')
                ->orderBy('name', 'asc');
        } else {
            $query->latest();
        }

        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $categories = $query
            ->paginate(10)
            ->withQueryString();

        return view('admin.categories.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
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
                'unique:categories,name',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:categories,slug',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

            'meta_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'meta_description' => [
                'nullable',
                'string',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Generate Slug
        |--------------------------------------------------------------------------
        */

        $slug = $request->filled('slug')
            ? Str::slug($request->slug)
            : Str::slug($request->name);

        /*
        |--------------------------------------------------------------------------
        | Ensure Unique Slug
        |--------------------------------------------------------------------------
        */

        $originalSlug = $slug;
        $counter = 1;

        while (Category::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }


        /*
        |--------------------------------------------------------------------------
        | Upload Image
        |--------------------------------------------------------------------------
        */

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('categories', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Create Category
        |--------------------------------------------------------------------------
        */

        Category::create([
            'user_id' => Auth::id(),

            'name' => $validated['name'],

            'slug' => $slug,

            'description' => $validated['description'] ?? null,

            'image' => $imagePath,

            'sort_order' => $validated['sort_order'] ?? 0,

            'is_active' => $request->boolean('is_active'),

            'meta_title' => $validated['meta_title'] ?? null,

            'meta_description' => $validated['meta_description'] ?? null,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::with([
            'user',
            'subCategories',
            'products',
        ])->findOrFail($id);

        return view('admin.categories.show', compact('category'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

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
                'unique:categories,name,' . $category->id,
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:categories,slug,' . $category->id,
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

            'meta_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'meta_description' => [
                'nullable',
                'string',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Generate Slug
        |--------------------------------------------------------------------------
        */

        $slug = $request->filled('slug')
            ? Str::slug($request->slug)
            : Str::slug($request->name);


        /*
        |--------------------------------------------------------------------------
        | Ensure Unique Slug
        |--------------------------------------------------------------------------
        */

        $originalSlug = $slug;
        $counter = 1;

        while (
            Category::where('slug', $slug)
                ->where('id', '!=', $category->id)
                ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }


        /*
        |--------------------------------------------------------------------------
        | Upload New Image
        |--------------------------------------------------------------------------
        */

        $imagePath = $category->image;

        if ($request->hasFile('image')) {

            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }

            $imagePath = $request->file('image')
                ->store('categories', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Update Category
        |--------------------------------------------------------------------------
        */

        $category->update([
            'name' => $validated['name'],

            'slug' => $slug,

            'description' => $validated['description'] ?? null,

            'image' => $imagePath,

            'sort_order' => $validated['sort_order'] ?? 0,

            'is_active' => $request->boolean('is_active'),

            'meta_title' => $validated['meta_title'] ?? null,

            'meta_description' => $validated['meta_description'] ?? null,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Check Related Products
        |--------------------------------------------------------------------------
        */

        if ($category->products()->exists()) {
            return redirect()
                ->route('admin.categories.index')
                ->with(
                    'error',
                    'This category cannot be deleted because it has products.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Check Related Sub Categories
        |--------------------------------------------------------------------------
        */

        if ($category->subCategories()->exists()) {
            return redirect()
                ->route('admin.categories.index')
                ->with(
                    'error',
                    'This category cannot be deleted because it has sub-categories.'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Image
        |--------------------------------------------------------------------------
        */

        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Category
        |--------------------------------------------------------------------------
        */

        $category->delete();


        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}