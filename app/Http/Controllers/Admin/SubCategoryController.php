<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = SubCategory::with(['category', 'user'])
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
        | Category Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category_id')) {

            $query->where('category_id', $request->category_id);

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
        | Sort
        |--------------------------------------------------------------------------
        */

        $allowedSorts = [
            'created_at',
            'name',
            'sort_order',
        ];

        $sortBy = $request->get('sort_by', 'created_at');

        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'created_at';
        }

        $sortDirection = $sortBy === 'name' ? 'asc' : 'desc';

        $query->orderBy($sortBy, $sortDirection);

        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        */

        $subCategories = $query
            ->paginate(15)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.sub-categories.index',
            compact('subCategories', 'categories')
        );
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.sub-categories.create',
            compact('categories')
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

            'category_id' => [
                'required',
                'integer',
                'exists:categories,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:sub_categories,slug',
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
        | Slug
        |--------------------------------------------------------------------------
        */

        $slug = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['name']);


        /*
        |--------------------------------------------------------------------------
        | Ensure Unique Slug
        |--------------------------------------------------------------------------
        */

        $originalSlug = $slug;
        $counter = 1;

        while (SubCategory::where('slug', $slug)->exists()) {

            $slug = $originalSlug . '-' . $counter;

            $counter++;
        }


        /*
        |--------------------------------------------------------------------------
        | Image Upload
        |--------------------------------------------------------------------------
        */

        $imagePath = null;

        if ($request->hasFile('image')) {

            $imagePath = $request
                ->file('image')
                ->store('sub-categories', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Create Sub Category
        |--------------------------------------------------------------------------
        */

        SubCategory::create([

            'user_id' => Auth::id(),

            'category_id' => $validated['category_id'],

            'name' => $validated['name'],

            'slug' => $slug,

            'description' => $validated['description'] ?? null,

            'image' => $imagePath,

            'sort_order' => $validated['sort_order'] ?? 0,

            'is_active' => $request->boolean('is_active'),

            'meta_title' => $validated['meta_title'] ?? null,

            'meta_description' =>
                $validated['meta_description'] ?? null,
        ]);


        return redirect()
            ->route('admin.sub-categories.index')
            ->with(
                'success',
                'Sub-category created successfully.'
            );
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subCategory = SubCategory::with([
            'category',
            'user',
            'products'
        ])->findOrFail($id);

        return view(
            'admin.sub-categories.show',
            compact('subCategory')
        );
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);

        $categories = Category::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view(
            'admin.sub-categories.edit',
            compact('subCategory', 'categories')
        );
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        string $id
    ) {

        $subCategory = SubCategory::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([

            'category_id' => [
                'required',
                'integer',
                'exists:categories,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique(
                    'sub_categories',
                    'slug'
                )->ignore($subCategory->id),
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
        | Slug
        |--------------------------------------------------------------------------
        */

        $slug = !empty($validated['slug'])
            ? Str::slug($validated['slug'])
            : Str::slug($validated['name']);


        /*
        |--------------------------------------------------------------------------
        | Ensure Unique Slug
        |--------------------------------------------------------------------------
        */

        $originalSlug = $slug;
        $counter = 1;

        while (
            SubCategory::where('slug', $slug)
                ->where('id', '!=', $subCategory->id)
                ->exists()
        ) {

            $slug = $originalSlug . '-' . $counter;

            $counter++;
        }


        /*
        |--------------------------------------------------------------------------
        | Image Upload
        |--------------------------------------------------------------------------
        */

        $imagePath = $subCategory->image;

        if ($request->hasFile('image')) {

            /*
            | Delete old image
            */

            if (
                $subCategory->image &&
                Storage::disk('public')->exists(
                    $subCategory->image
                )
            ) {

                Storage::disk('public')->delete(
                    $subCategory->image
                );
            }


            /*
            | Upload new image
            */

            $imagePath = $request
                ->file('image')
                ->store('sub-categories', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Update
        |--------------------------------------------------------------------------
        */

        $subCategory->update([

            'category_id' => $validated['category_id'],

            'name' => $validated['name'],

            'slug' => $slug,

            'description' =>
                $validated['description'] ?? null,

            'image' => $imagePath,

            'sort_order' =>
                $validated['sort_order'] ?? 0,

            'is_active' =>
                $request->boolean('is_active'),

            'meta_title' =>
                $validated['meta_title'] ?? null,

            'meta_description' =>
                $validated['meta_description'] ?? null,
        ]);


        return redirect()
            ->route('admin.sub-categories.index')
            ->with(
                'success',
                'Sub-category updated successfully.'
            );
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Delete Image
        |--------------------------------------------------------------------------
        */

        if (
            $subCategory->image &&
            Storage::disk('public')->exists(
                $subCategory->image
            )
        ) {

            Storage::disk('public')->delete(
                $subCategory->image
            );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Record
        |--------------------------------------------------------------------------
        */

        $subCategory->delete();


        return redirect()
            ->route('admin.sub-categories.index')
            ->with(
                'success',
                'Sub-category deleted successfully.'
            );
    }
}