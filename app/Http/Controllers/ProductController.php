<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        if ($request->filled('q')) {
            $query->where('name', 'like', '%' . $request->q . '%');
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        $query->when($request->sort === 'low_high', fn($q) => $q->orderBy('price'))
            ->when($request->sort === 'high_low', fn($q) => $q->orderByDesc('price'))
            ->when(!$request->sort, fn($q) => $q->orderByDesc('is_featured'));

        $products = $query->paginate(20)->withQueryString();
        $categories = Category::where('is_active', true)->orderBy('sort_order')->get();

        return view('shop.index', compact('products', 'categories'));
    }

    public function show(string $slug)
    {
        $product = Product::with(['category', 'images'])->where('slug', $slug)->firstOrFail();

        $related = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(6)
            ->get();

        return view('product.show', compact('product', 'related'));
    }
}