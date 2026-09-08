<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\District;
use App\Models\Thana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    /**
     * Display a listing of customers.
     */
    public function index(Request $request)
    {
        $query = Customer::with(['district', 'thana']);

        // Search filter
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone_number', 'like', "%{$search}%");
            });
        }

        // District filter
        if ($request->filled('district_id')) {

            $query->where(
                'district_id',
                $request->district_id
            );
        }

        // Thana filter
        if ($request->filled('thana_id')) {

            $query->where(
                'thana_id',
                $request->thana_id
            );
        }

        // Active filter
        if ($request->filled('is_active')) {

            $query->where(
                'is_active',
                $request->is_active
            );
        }

        // Verification filter
        if ($request->filled('is_verified')) {

            $query->where(
                'is_verified',
                $request->is_verified
            );
        }

        // Per page
        $allowedPerPage = [10, 25, 50, 100];

        $perPage = (int) $request->get(
            'per_page',
            25
        );

        if (!in_array($perPage, $allowedPerPage)) {
            $perPage = 25;
        }

        $customers = $query
            ->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->withQueryString();

        $districts = District::orderBy('name')->get();

        $thanas = Thana::orderBy('name')->get();

        return view(
            'admin.customers.index',
            compact(
                'customers',
                'districts',
                'thanas'
            )
        );
    }


    /**
     * Show create customer form.
     */
    public function create()
    {
        $districts = District::orderBy('name')->get();

        return view(
            'admin.customers.create',
            compact('districts')
        );
    }


    /**
     * Store customer.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [

                'name' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:customers,email',
                ],

                'phone_number' => [
                    'nullable',
                    'string',
                    'max:20',
                    'unique:customers,phone_number',
                ],

                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                ],

                'district_id' => [
                    'required',
                    'exists:districts,id',
                ],

                'thana_id' => [
                    'required',

                    Rule::exists('thanas', 'id')
                        ->where(function ($query) use ($request) {

                            $query->where(
                                'district_id',
                                $request->district_id
                            );
                        }),
                ],

                'address' => [
                    'required',
                    'string',
                ],

                'is_verified' => [
                    'nullable',
                    'boolean',
                ],

                'is_active' => [
                    'nullable',
                    'boolean',
                ],
            ]
        );


        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        Customer::create([

            'name' => $request->name,

            'email' => $request->email,

            'phone_number' => $request->phone_number,

            'password' => Hash::make(
                $request->password
            ),

            'district_id' => $request->district_id,

            'thana_id' => $request->thana_id,

            'address' => $request->address,

            'is_verified' => $request->boolean(
                'is_verified'
            ),

            'is_active' => $request->boolean(
                'is_active'
            ),
        ]);


        return redirect()
            ->route('admin.customers.index')
            ->with(
                'success',
                'Customer created successfully!'
            );
    }


    /**
     * Display customer.
     */
    public function show(string $id)
    {
        $customer = Customer::with([
            'district',
            'thana',
            'orders'
        ])->findOrFail($id);

        return view(
            'admin.customers.show',
            compact('customer')
        );
    }


    /**
     * Show edit form.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);

        $districts = District::orderBy('name')->get();

        $thanas = Thana::where(
            'district_id',
            $customer->district_id
        )
            ->orderBy('name')
            ->get();

        return view(
            'admin.customers.edit',
            compact(
                'customer',
                'districts',
                'thanas'
            )
        );
    }


    /**
     * Update customer.
     */
    public function update(
        Request $request,
        string $id
    ) {
        $customer = Customer::findOrFail($id);


        $validator = Validator::make(
            $request->all(),
            [

                'name' => [
                    'required',
                    'string',
                    'max:100',
                ],

                'email' => [
                    // 'required',
                    'email',
                    'max:255',

                    Rule::unique(
                        'customers',
                        'email'
                    )->ignore($customer->id),
                ],

                'phone_number' => [
                    'nullable',
                    'string',
                    'max:20',

                    Rule::unique(
                        'customers',
                        'phone_number'
                    )->ignore($customer->id),
                ],

                'password' => [
                    'nullable',
                    'string',
                    'min:8',
                    'confirmed',
                ],

                'district_id' => [
                    'required',
                    'exists:districts,id',
                ],

                'thana_id' => [
                    'required',

                    Rule::exists('thanas', 'id')
                        ->where(function ($query) use ($request) {

                            $query->where(
                                'district_id',
                                $request->district_id
                            );
                        }),
                ],

                'address' => [
                    'required',
                    'string',
                ],

                'is_verified' => [
                    'nullable',
                    'boolean',
                ],

                'is_active' => [
                    'nullable',
                    'boolean',
                ],
            ]
        );


        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $data = [

            'name' => $request->name,

            'email' => $request->email,

            'phone_number' => $request->phone_number,

            'district_id' => $request->district_id,

            'thana_id' => $request->thana_id,

            'address' => $request->address,

            'is_verified' => $request->boolean(
                'is_verified'
            ),

            'is_active' => $request->boolean(
                'is_active'
            ),
        ];


        // Update password only if provided
        if ($request->filled('password')) {

            $data['password'] = Hash::make(
                $request->password
            );
        }


        $customer->update($data);


        return redirect()
            ->route('admin.customers.index')
            ->with(
                'success',
                'Customer updated successfully!'
            );
    }


    /**
     * Delete customer.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->delete();

        return redirect()
            ->route('admin.customers.index')
            ->with(
                'success',
                'Customer deleted successfully!'
            );
    }


    /**
     * Get thanas by district ID.
     */
    public function getThanas(Request $request)
    {
        $request->validate([
            'district_id' => [
                'required',
                'exists:districts,id',
            ],
        ]);


        $thanas = Thana::where(
            'district_id',
            $request->district_id
        )
            ->orderBy('name')
            ->get([
                'id',
                'district_id',
                'name',
            ]);


        return response()->json($thanas);
    }


    /**
     * Toggle customer status.
     */
    public function toggleStatus(
        Request $request,
        string $id
    ) {
        $customer = Customer::findOrFail($id);

        $customer->is_active =
            !$customer->is_active;

        $customer->save();

        return redirect()
            ->back()
            ->with(
                'success',
                'Customer status toggled successfully!'
            );
    }


    /**
     * Toggle customer verification.
     */
    public function toggleVerification(
        Request $request,
        string $id
    ) {
        $customer = Customer::findOrFail($id);

        $customer->is_verified =
            !$customer->is_verified;

        $customer->save();

        return redirect()
            ->back()
            ->with(
                'success',
                'Customer verification toggled successfully!'
            );
    }
}