<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DistrictController extends Controller
{
    /**
     * Display a listing of the districts.
     */
    public function index(Request $request)
    {
        $query = District::with('division');

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('bn_name', 'like', "%{$search}%")
                    ->orWhere('code', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('is_active')) {
            $query->where('is_active', $request->is_active);
        }

        // Division filter
        if ($request->filled('division_id')) {
            $query->where('division_id', $request->division_id);
        }

        // Per page
        $perPage = $request->get('per_page', 25);

        // Prevent invalid per page values
        if (!in_array($perPage, [10, 25, 50, 100, 'all'])) {
            $perPage = 25;
        }

        if ($perPage === 'all') {
            $perPage = $query->count();
        }

        $districts = $query
            ->orderBy('name')
            ->paginate($perPage)
            ->withQueryString();

        $divisions = Division::orderBy('name')->get();

        return view('admin.districts.index', compact(
            'districts',
            'divisions'
        ));
    }


    /**
     * Show the form for creating a new district.
     */
    public function create()
    {
        $divisions = Division::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('admin.districts.create', compact('divisions'));
    }


    /**
     * Store a newly created district.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'division_id' => [
                'required',
                'integer',
                'exists:divisions,id',
            ],

            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'bn_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'code' => [
                'nullable',
                'string',
                'max:10',
                'unique:districts,code',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        District::create($validated);

        return redirect()
            ->route('admin.districts.index')
            ->with('success', 'District created successfully!');
    }


    /**
     * Display the specified district.
     */
    public function show(string $id)
    {
        $district = District::with([
            'division',
            'thanas',
        ])->findOrFail($id);

        return view('admin.districts.show', compact('district'));
    }


    /**
     * Show the form for editing the specified district.
     */
    public function edit(string $id)
    {
        $district = District::findOrFail($id);

        $divisions = Division::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('admin.districts.edit', compact(
            'district',
            'divisions'
        ));
    }


    /**
     * Update the specified district.
     */
    public function update(Request $request, string $id)
    {
        $district = District::findOrFail($id);

        $validated = $request->validate([
            'division_id' => [
                'required',
                'integer',
                'exists:divisions,id',
            ],

            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'bn_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'code' => [
                'nullable',
                'string',
                'max:10',
                Rule::unique('districts', 'code')
                    ->ignore($district->id),
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $district->update($validated);

        return redirect()
            ->route('admin.districts.index')
            ->with('success', 'District updated successfully!');
    }


    /**
     * Remove the specified district.
     */
    public function destroy(string $id)
    {
        $district = District::findOrFail($id);

        $district->delete();

        return redirect()
            ->route('admin.districts.index')
            ->with('success', 'District deleted successfully!');
    }


    /**
     * Toggle district status.
     */
    public function toggleStatus(string $id)
    {
        $district = District::findOrFail($id);

        $district->update([
            'is_active' => ! $district->is_active,
        ]);

        return redirect()
            ->back()
            ->with('success', 'District status updated successfully!');
    }


    /**
     * Get active districts for AJAX requests.
     */
    public function getDistricts(Request $request)
    {
        $query = District::active()
            ->orderBy('name');

        // Optional division filter
        if ($request->filled('division_id')) {
            $query->where('division_id', $request->division_id);
        }

        $districts = $query->get([
            'id',
            'division_id',
            'name',
            'bn_name',
            'code',
        ]);

        return response()->json($districts);
    }
}