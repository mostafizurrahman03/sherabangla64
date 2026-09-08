<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Thana;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ThanaController extends Controller
{
    
    // Display a listing of the resource.
     
    public function index(Request $request)
    {
        $query = Thana::with('district');

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('bn_name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%");
        }

        // District filter
        if ($request->filled('district_id')) {
            $query->where('district_id', $request->district_id);
        }

        // Status filter
        if ($request->filled('is_active')) {
            $query->where('is_active', $request->is_active);
        }

        // Per page
        $perPage = $request->get('per_page', 25);
        $thanas = $query->orderBy('name')->paginate($perPage);
        $districts = District::orderBy('name')->get();

        return view('admin.thanas.index', compact('thanas', 'districts'));
    }

    
    // Show the form for creating a new resource.
     
    public function create()
    {
        $districts = District::orderBy('name')->get();
        return view('admin.thanas.create', compact('districts'));
    }

    
    // Store a newly created resource in storage.
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'bn_name' => 'nullable|string|max:100',
            'district_id' => 'required|exists:districts,id',
            'code' => 'nullable|string|max:10|unique:thanas,code',
            'is_active' => 'boolean',
        ]);

        $thana = Thana::create($validated);

        return redirect()->route('admin.thanas.index')
            ->with('success', 'Thana created successfully!');
    }

    
    // Display the specified resource.
    
    public function show(string $id)
    {
        $thana = Thana::with('district')->findOrFail($id);
        return view('admin.thanas.show', compact('thana'));
    }

    
    // Show the form for editing the specified resource.
    
    public function edit(string $id)
    {
        $thana = Thana::findOrFail($id);
        $districts = District::orderBy('name')->get();
        return view('admin.thanas.edit', compact('thana', 'districts'));
    }

    
    // Update the specified resource in storage.
    
    public function update(Request $request, string $id)
    {
        $thana = Thana::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'bn_name' => 'nullable|string|max:100',
            'district_id' => 'required|exists:districts,id',
            'code' => [
                'nullable',
                'string',
                'max:10',
                Rule::unique('thanas', 'code')->ignore($thana->id),
            ],
            'is_active' => 'boolean',
        ]);

        $thana->update($validated);

        return redirect()->route('admin.thanas.index')
            ->with('success', 'Thana updated successfully!');
    }

    
    // Remove the specified resource from storage.
    
    public function destroy(string $id)
    {
        $thana = Thana::findOrFail($id);
        $thana->delete();

        return redirect()->route('admin.thanas.index')
            ->with('success', 'Thana deleted successfully!');
    }

    
    // Toggle thana status.
    
    public function toggleStatus(string $id)
    {
        $thana = Thana::findOrFail($id);
        $thana->is_active = !$thana->is_active;
        $thana->save();

        return redirect()->back()
            ->with('success', 'Thana status toggled successfully!');
    }

    
    // Get thanas by district for AJAX requests.
    
    public function getThanasByDistrict(Request $request)
    {
        $request->validate([
            'district_id' => 'required|exists:districts,id',
        ]);

        $thanas = Thana::where('district_id', $request->district_id)
            ->active()
            ->orderBy('name')
            ->get(['id', 'name', 'bn_name', 'code']);

        return response()->json($thanas);
    }
}