<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // $categories = Category::where('is_active', true)->orderBy('sort_order')->get();
        // $flashSale = Product::active()->whereNotNull('compare_price')->latest()->take(10)->get();
        // $bestSellers = Product::active()->where('is_featured', true)->take(10)->get();
        // $newArrivals = Product::active()->latest()->take(10)->get();

        // return view('home.index', compact('categories', 'flashSale', 'bestSellers', 'newArrivals'));


        // Active categories
        $categories = Category::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // Flash Sale Products
        $flashSale = Product::onSale()
            ->latest()
            ->take(10)
            ->get();

        // Featured / Best Sellers
        $bestSellers = Product::featured()
            ->orderBy('sort_order')
            ->take(10)
            ->get();

        // New Arrivals
        $newArrivals = Product::published()
            ->latest()
            ->take(10)
            ->get();

        return view('home.index', compact(
            'categories',
            'flashSale',
            'bestSellers',
            'newArrivals'
        ));





    }
}