<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;

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
        $flashSale = Product::where("is_flash", 1)
            ->latest()
            ->take(10)
            ->get();

        // Featured / Best Sellers
        $bestSellers = Product::where("is_best", 1)
            ->latest()
            ->take(10)
            ->get();

        // New Arrivals
        $newArrivals = Product::where("is_featured", 1)
            ->latest()
            ->take(10)
            ->get();
        $sliders = Slider::where('is_active', 1)
            ->where('position', 'main_slider')
            ->orderBy('sort_order', 'asc')
            ->get();

        $slide_top = Slider::where('is_active', 1)
            ->where('position', 'side_top')
            ->first();
        $slide_bottom = Slider::where('is_active', 1)
            ->where('position', 'side_bottom')
            ->first();

        return view('home.index', compact(
            'categories',
            'flashSale',
            'bestSellers',
            'sliders',
            'newArrivals',
            'slide_bottom',
            'slide_top',
        ));





    }
}