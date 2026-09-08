<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CouponController extends Controller
{
    /**
     * Display a listing of the coupons.
     */
    public function index(Request $request)
    {
        $query = Coupon::query();

        // Search by coupon code
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where('coupon_code', 'like', '%' . $search . '%');
        }

        // Coupon type filter
        if ($request->filled('coupon_type')) {
            $query->where('coupon_type', $request->coupon_type);
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('is_active', $request->status);
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');

        $allowedSorts = [
            'coupon_code',
            'coupon_type',
            'discount_value',
            'valid_from',
            'valid_to',
            'created_at',
        ];

        if (!in_array($sortBy, $allowedSorts)) {
            $sortBy = 'created_at';
        }

        if (!in_array($sortOrder, ['asc', 'desc'])) {
            $sortOrder = 'desc';
        }

        // Pagination
        $coupons = $query
            ->orderBy($sortBy, $sortOrder)
            ->paginate(10)
            ->withQueryString();

        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new coupon.
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created coupon.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'coupon_code' => [
                'required',
                'string',
                'max:50',
                'unique:coupons,coupon_code',
            ],

            'coupon_type' => [
                'required',
                Rule::in([
                    'PERCENTAGE',
                    'FIXED_AMOUNT',
                    'FREE_SHIPPING',
                ]),
            ],

            'discount_value' => [
                'required',
                'numeric',
                'min:0',
            ],

            'minimum_order_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'max_discount_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'usage_limit' => [
                'nullable',
                'integer',
                'min:1',
            ],

            'per_user_limit' => [
                'required',
                'integer',
                'min:1',
            ],

            'valid_from' => [
                'required',
                'date',
            ],

            'valid_to' => [
                'required',
                'date',
                'after:valid_from',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        // Convert coupon code to uppercase
        $validated['coupon_code'] = strtoupper(
            trim($validated['coupon_code'])
        );

        // Default values
        $validated['minimum_order_amount'] =
            $validated['minimum_order_amount'] ?? 0;

        $validated['max_discount_amount'] =
            $validated['max_discount_amount'] ?? null;

        $validated['usage_limit'] =
            $validated['usage_limit'] ?? null;

        $validated['is_active'] =
            $request->boolean('is_active');

        Coupon::create($validated);

        return redirect()
            ->route('admin.coupons.index')
            ->with('success', 'Coupon created successfully.');
    }

    /**
     * Display the specified coupon.
     */
    public function show(Coupon $coupon)
    {
        return redirect()
            ->route('admin.coupons.index');
    }

    /**
     * Show the form for editing the specified coupon.
     */
    public function edit(Coupon $coupon)
    {
        return view(
            'admin.coupons.edit',
            compact('coupon')
        );
    }

    /**
     * Update the specified coupon.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $validated = $request->validate([
            'coupon_code' => [
                'required',
                'string',
                'max:50',
                Rule::unique('coupons', 'coupon_code')
                    ->ignore($coupon->coupon_id, 'coupon_id'),
            ],

            'coupon_type' => [
                'required',
                Rule::in([
                    'PERCENTAGE',
                    'FIXED_AMOUNT',
                    'FREE_SHIPPING',
                ]),
            ],

            'discount_value' => [
                'required',
                'numeric',
                'min:0',
            ],

            'minimum_order_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'max_discount_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'usage_limit' => [
                'nullable',
                'integer',
                'min:1',
            ],

            'per_user_limit' => [
                'required',
                'integer',
                'min:1',
            ],

            'valid_from' => [
                'required',
                'date',
            ],

            'valid_to' => [
                'required',
                'date',
                'after:valid_from',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);

        // Convert coupon code to uppercase
        $validated['coupon_code'] = strtoupper(
            trim($validated['coupon_code'])
        );

        // Default values
        $validated['minimum_order_amount'] =
            $validated['minimum_order_amount'] ?? 0;

        $validated['max_discount_amount'] =
            $validated['max_discount_amount'] ?? null;

        $validated['usage_limit'] =
            $validated['usage_limit'] ?? null;

        $validated['is_active'] =
            $request->boolean('is_active');

        $coupon->update($validated);

        return redirect()
            ->route('admin.coupons.index')
            ->with('success', 'Coupon updated successfully.');
    }

    /**
     * Remove the specified coupon.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return redirect()
            ->route('admin.coupons.index')
            ->with('success', 'Coupon deleted successfully.');
    }
}