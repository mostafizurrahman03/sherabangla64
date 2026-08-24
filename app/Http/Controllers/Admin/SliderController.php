<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Slider::with('user');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('subtitle', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('is_active', $request->status);
        }

        // Sort
        $sortBy = $request->get('sort_by', 'sort_order');
        $sortOrder = $request->get('sort_order', 'asc');

        $allowedSorts = [
            'title',
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
            'title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'subtitle' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'button_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            'button_url' => [
                'nullable',
                'string',
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

        // Upload image
        $imagePath = $request->file('image')->store(
            'sliders',
            'public'
        );

        Slider::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'] ?? null,
            'subtitle' => $validated['subtitle'] ?? null,
            'description' => $validated['description'] ?? null,
            'image' => $imagePath,
            'button_text' => $validated['button_text'] ?? null,
            'button_url' => $validated['button_url'] ?? null,
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
    public function show(string $id)
    {
        $slider = Slider::with('user')->findOrFail($id);

        return view('admin.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);

        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);

        $validated = $request->validate([
            'title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'subtitle' => [
                'nullable',
                'string',
                'max:255',
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

            'button_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            'button_url' => [
                'nullable',
                'string',
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

        $imagePath = $slider->image;

        // New image uploaded
        if ($request->hasFile('image')) {

            // Delete old image
            if (
                $slider->image &&
                Storage::disk('public')->exists($slider->image)
            ) {
                Storage::disk('public')->delete($slider->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store(
                'sliders',
                'public'
            );
        }

        $slider->update([
            'title' => $validated['title'] ?? null,
            'subtitle' => $validated['subtitle'] ?? null,
            'description' => $validated['description'] ?? null,
            'image' => $imagePath,
            'button_text' => $validated['button_text'] ?? null,
            'button_url' => $validated['button_url'] ?? null,
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
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);

        // Delete image
        if (
            $slider->image &&
            Storage::disk('public')->exists($slider->image)
        ) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return redirect()
            ->route('admin.sliders.index')
            ->with('success', 'Slider deleted successfully.');
    }
}