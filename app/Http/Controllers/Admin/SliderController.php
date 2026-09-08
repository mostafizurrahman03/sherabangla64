<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Slider::with('user');

        /*
        |--------------------------------------------------------------------------
        | Position Filter
        |--------------------------------------------------------------------------
        */
        if ($request->filled('position')) {
            $query->where('position', $request->position);
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
        $sortBy = $request->get('sort_by', 'sort_order');
        $sortOrder = $request->get('sort_order', 'asc');

        $allowedSorts = [
            'position',
            'sort_order',
            'created_at',
            'start_at',
            'end_at',
        ];

        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'sort_order';
        }

        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'asc';
        }

        /*
        |--------------------------------------------------------------------------
        | Pagination
        |--------------------------------------------------------------------------
        | 10 sliders per page
        | withQueryString() keeps filter/search parameters
        | when moving between pagination pages.
        |--------------------------------------------------------------------------
        */
        $sliders = $query
            ->orderBy($sortBy, $sortOrder)
            ->paginate(10)
            ->withQueryString();

        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'position' => [
                'required',
                'string',
                'in:main_slider,side_top,side_bottom',
            ],

            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'link_url' => [
                'nullable',
                'url',
                'max:255',
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

            'start_at' => [
                'nullable',
                'date',
            ],

            'end_at' => [
                'nullable',
                'date',
                'after_or_equal:start_at',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload Image
        |--------------------------------------------------------------------------
        */
        $imagePath = $request
            ->file('image')
            ->store('sliders', 'public');

        /*
        |--------------------------------------------------------------------------
        | Create Slider
        |--------------------------------------------------------------------------
        */
        Slider::create([
            'user_id' => auth()->id(),
            'position' => $validated['position'],
            'image' => $imagePath,
            'link_url' => $validated['link_url'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
            'start_at' => $validated['start_at'] ?? null,
            'end_at' => $validated['end_at'] ?? null,
        ]);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        $slider->load('user');

        return view('admin.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'position' => [
                'required',
                'string',
                'in:main_slider,side_top,side_bottom',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'link_url' => [
                'nullable',
                'url',
                'max:255',
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

            'start_at' => [
                'nullable',
                'date',
            ],

            'end_at' => [
                'nullable',
                'date',
                'after_or_equal:start_at',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Existing Image
        |--------------------------------------------------------------------------
        */
        $imagePath = $slider->image;

        /*
        |--------------------------------------------------------------------------
        | Update Image
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('image')) {

            if (
                $slider->image &&
                Storage::disk('public')->exists($slider->image)
            ) {
                Storage::disk('public')->delete($slider->image);
            }

            $imagePath = $request
                ->file('image')
                ->store('sliders', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Update Slider
        |--------------------------------------------------------------------------
        */
        $slider->update([
            'position' => $validated['position'],
            'image' => $imagePath,
            'link_url' => $validated['link_url'] ?? null,
            'sort_order' => $validated['sort_order'] ?? 0,
            'is_active' => $request->boolean('is_active'),
            'start_at' => $validated['start_at'] ?? null,
            'end_at' => $validated['end_at'] ?? null,
        ]);

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Image
        |--------------------------------------------------------------------------
        */
        if (
            $slider->image &&
            Storage::disk('public')->exists($slider->image)
        ) {
            Storage::disk('public')->delete($slider->image);
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Slider
        |--------------------------------------------------------------------------
        */
        $slider->delete();

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider deleted successfully.');
    }
}