<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::with([
            'category',
            'subCategory',
            'brand',
            'user',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {
            $query->where('status', $request->status);
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
        | Ordering
        |--------------------------------------------------------------------------
        */

        $products = $query
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $categories = Category::orderBy('name')->get();

        return view('admin.products.index', compact(
            'products',
            'categories'
        ));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        $subCategories = SubCategory::orderBy('name')->get();

        $brands = Brand::orderBy('name')->get();

        return view('admin.products.create', compact(
            'categories',
            'subCategories',
            'brands'
        ));
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
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:products,slug',
            ],

            'sku' => [
                'nullable',
                'string',
                'max:255',
                'unique:products,sku',
            ],

            'short_desc' => [
                'nullable',
                'string',
            ],

            'full_desc' => [
                'nullable',
                'string',
            ],

            'regular_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'sale_price' => [
                'nullable',
                'numeric',
                'min:0',
                'lte:regular_price',
            ],

            'discount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'sub_category_id' => [
                'nullable',
                'exists:sub_categories,id',
            ],

            'brand_id' => [
                'nullable',
                'exists:brands,id',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'stock_quantity' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'low_stock_threshold' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'status' => [
                'required',
                'in:draft,published,archived',
            ],

            'is_featured' => [
                'nullable',
                'boolean',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
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

            'published_at' => [
                'nullable',
                'date',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Generate Slug
        |--------------------------------------------------------------------------
        */

        $slug = $validated['slug'] ?? Str::slug($validated['name']);

        /*
        |--------------------------------------------------------------------------
        | Make Slug Unique
        |--------------------------------------------------------------------------
        */

        $originalSlug = $slug;
        $counter = 1;

        while (Product::where('slug', $slug)->exists()) {
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
            $imagePath = $request->file('image')
                ->store('products', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Published At
        |--------------------------------------------------------------------------
        */

        $publishedAt = $validated['published_at'] ?? null;

        if (
            $validated['status'] === 'published'
            && !$publishedAt
        ) {
            $publishedAt = now();
        }


        /*
        |--------------------------------------------------------------------------
        | Create Product
        |--------------------------------------------------------------------------
        */

        Product::create([
            'user_id' => Auth::id(),

            'name' => $validated['name'],

            'slug' => $slug,

            'sku' => $validated['sku'] ?? null,

            'short_desc' => $validated['short_desc'] ?? null,

            'full_desc' => $validated['full_desc'] ?? null,

            'regular_price' => $validated['regular_price'],

            'sale_price' => $validated['sale_price'] ?? null,

            'discount' => $validated['discount'] ?? 0,

            'category_id' => $validated['category_id'],

            'sub_category_id' => $validated['sub_category_id'] ?? null,

            'brand_id' => $validated['brand_id'] ?? null,

            'image' => $imagePath,

            'stock_quantity' => $validated['stock_quantity'] ?? 0,

            'low_stock_threshold' => $validated['low_stock_threshold'] ?? 5,

            'status' => $validated['status'],

            'is_featured' => $request->boolean('is_featured'),

            'sort_order' => $validated['sort_order'] ?? 0,

            'meta_title' => $validated['meta_title'] ?? null,

            'meta_description' => $validated['meta_description'] ?? null,

            'published_at' => $publishedAt,
        ]);


        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with([
            'category',
            'subCategory',
            'brand',
            'user',
        ])->findOrFail($id);

        return view('admin.products.show', compact('product'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        $categories = Category::orderBy('name')->get();

        $subCategories = SubCategory::orderBy('name')->get();

        $brands = Brand::orderBy('name')->get();

        return view('admin.products.edit', compact(
            'product',
            'categories',
            'subCategories',
            'brands'
        ));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);


        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:products,slug,' . $product->id,
            ],

            'sku' => [
                'nullable',
                'string',
                'max:255',
                'unique:products,sku,' . $product->id,
            ],

            'short_desc' => [
                'nullable',
                'string',
            ],

            'full_desc' => [
                'nullable',
                'string',
            ],

            'regular_price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'sale_price' => [
                'nullable',
                'numeric',
                'min:0',
                'lte:regular_price',
            ],

            'discount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'category_id' => [
                'required',
                'exists:categories,id',
            ],

            'sub_category_id' => [
                'nullable',
                'exists:sub_categories,id',
            ],

            'brand_id' => [
                'nullable',
                'exists:brands,id',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'stock_quantity' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'low_stock_threshold' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'status' => [
                'required',
                'in:draft,published,archived',
            ],

            'is_featured' => [
                'nullable',
                'boolean',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
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

            'published_at' => [
                'nullable',
                'date',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $slug = $validated['slug'] ?? Str::slug($validated['name']);

        $originalSlug = $slug;
        $counter = 1;

        while (
            Product::where('slug', $slug)
                ->where('id', '!=', $product->id)
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

        $imagePath = $product->image;

        if ($request->hasFile('image')) {

            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $imagePath = $request->file('image')
                ->store('products', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | Published At
        |--------------------------------------------------------------------------
        */

        $publishedAt = $validated['published_at'] ?? null;

        if (
            $validated['status'] === 'published'
            && !$publishedAt
        ) {
            $publishedAt = $product->published_at ?? now();
        }


        /*
        |--------------------------------------------------------------------------
        | Update
        |--------------------------------------------------------------------------
        */

        $product->update([
            'name' => $validated['name'],

            'slug' => $slug,

            'sku' => $validated['sku'] ?? null,

            'short_desc' => $validated['short_desc'] ?? null,

            'full_desc' => $validated['full_desc'] ?? null,

            'regular_price' => $validated['regular_price'],

            'sale_price' => $validated['sale_price'] ?? null,

            'discount' => $validated['discount'] ?? 0,

            'category_id' => $validated['category_id'],

            'sub_category_id' => $validated['sub_category_id'] ?? null,

            'brand_id' => $validated['brand_id'] ?? null,

            'image' => $imagePath,

            'stock_quantity' => $validated['stock_quantity'] ?? 0,

            'low_stock_threshold' => $validated['low_stock_threshold'] ?? 5,

            'status' => $validated['status'],

            'is_featured' => $request->boolean('is_featured'),

            'sort_order' => $validated['sort_order'] ?? 0,

            'meta_title' => $validated['meta_title'] ?? null,

            'meta_description' => $validated['meta_description'] ?? null,

            'published_at' => $publishedAt,
        ]);


        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | Delete Image
        |--------------------------------------------------------------------------
        */

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Product
        |--------------------------------------------------------------------------
        */

        $product->delete();


        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}