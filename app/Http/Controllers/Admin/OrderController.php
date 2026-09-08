<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of orders.
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | AJAX / DataTables Request
        |--------------------------------------------------------------------------
        */
        if ($request->ajax()) {

            $query = Order::query()
                ->with(['customer', 'user', 'items'])
                ->select('orders.*');

            /*
            |--------------------------------------------------------------------------
            | Custom Order Status Filter
            |--------------------------------------------------------------------------
            */
            if ($request->filled('order_status')) {
                $query->where(
                    'orders.order_status',
                    $request->order_status
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Custom Payment Status Filter
            |--------------------------------------------------------------------------
            */
            if ($request->filled('payment_status')) {
                $query->where(
                    'orders.payment_status',
                    $request->payment_status
                );
            }

            /*
            |--------------------------------------------------------------------------
            | Custom Date Range Filter
            |--------------------------------------------------------------------------
            */
            if ($request->filled('date_range')) {

                $dates = explode(
                    ' - ',
                    $request->date_range
                );

                if (count($dates) === 2) {

                    try {

                        $startDate = Carbon::createFromFormat(
                            'Y-m-d',
                            trim($dates[0])
                        )->startOfDay();

                        $endDate = Carbon::createFromFormat(
                            'Y-m-d',
                            trim($dates[1])
                        )->endOfDay();

                        $query->whereBetween(
                            'orders.created_at',
                            [
                                $startDate,
                                $endDate
                            ]
                        );

                    } catch (\Throwable $e) {
                        // Ignore invalid date range
                    }
                }
            }

            /*
            |--------------------------------------------------------------------------
            | DataTables
            |--------------------------------------------------------------------------
            */
            return DataTables::eloquent($query)

                /*
                |--------------------------------------------------------------------------
                | Index
                |--------------------------------------------------------------------------
                */
                ->addIndexColumn()

                /*
                |--------------------------------------------------------------------------
                | Order Number
                |--------------------------------------------------------------------------
                */
                ->editColumn('order_number', function ($order) {

                    return '<strong>'
                        . e($order->order_number)
                        . '</strong>';
                })

                /*
                |--------------------------------------------------------------------------
                | Customer Name
                |--------------------------------------------------------------------------
                */
                ->addColumn('customer_name', function ($order) {

                    if ($order->customer) {
                        return e(
                            $order->customer->name
                        );
                    }

                    return e(
                        $order->shipping_name ?? '-'
                    );
                })

                /*
                |--------------------------------------------------------------------------
                | Customer Phone
                |--------------------------------------------------------------------------
                */
                ->addColumn('customer_phone', function ($order) {

                    if ($order->customer) {
                        return e(
                            $order->customer->phone_number
                        );
                    }

                    return e(
                        $order->shipping_phone ?? '-'
                    );
                })

                /*
                |--------------------------------------------------------------------------
                | Products HTML (Order Items)
                |--------------------------------------------------------------------------
                */
                ->addColumn('products_html', function ($order) {

                    $items = $order->items;

                    if ($items->isEmpty()) {
                        return '<span class="text-muted">No items</span>';
                    }

                    $html = '<div class="product-items" style="max-width:200px; font-size:12px;">';

                    foreach ($items as $item) {
                        $productName = $item->product_name ?? $item->name ?? 'Product';
                        $quantity = $item->quantity ?? 1;

                        $html .= '<div class="item" style="padding:2px 0; border-bottom:1px dashed #e9ecef;">';
                        $html .= '<span>' . e($productName) . '</span>';
                        $html .= ' <span class="qty" style="display:inline-block; background:#e9ecef; padding:0 6px; border-radius:10px; font-size:10px; margin-left:3px;">×' . $quantity . '</span>';
                        $html .= '</div>';
                    }

                    $html .= '</div>';

                    return $html;
                })

                /*
                |--------------------------------------------------------------------------
                | Formatted Grand Total
                |--------------------------------------------------------------------------
                */
                ->addColumn(
                    'formatted_grand_total',
                    function ($order) {

                        return '৳ '
                            . number_format(
                                (float) $order->grand_total,
                                2
                            );
                    }
                )

                /*
                |--------------------------------------------------------------------------
                | Payment Status Badge
                |--------------------------------------------------------------------------
                */
                ->addColumn(
                    'payment_status_badge',
                    function ($order) {

                        $status =
                            strtoupper(
                                (string) $order->payment_status
                            );

                        $badgeClass = match ($status) {

                            'PENDING' =>
                                'badge-warning',

                            'PAID' =>
                                'badge-success',

                            'FAILED' =>
                                'badge-danger',

                            'REFUNDED' =>
                                'badge-dark',

                            default =>
                                'badge-secondary',
                        };

                        $label =
                            Order::PAYMENT_STATUSES[$status]
                            ?? $status
                            ?: 'N/A';

                        return '<span class="badge '
                            . $badgeClass
                            . '">'
                            . e($label)
                            . '</span>';
                    }
                )

                /*
                |--------------------------------------------------------------------------
                | Order Status Badge
                |--------------------------------------------------------------------------
                */
                ->addColumn(
                    'status_badge',
                    function ($order) {

                        $status =
                            strtoupper(
                                (string) $order->order_status
                            );

                        $badgeClass = match ($status) {

                            'PLACED' =>
                                'badge-warning',

                            'CONFIRMED' =>
                                'badge-info',

                            'PROCESSING' =>
                                'badge-primary',

                            'SHIPPED' =>
                                'badge-secondary',

                            'DELIVERED' =>
                                'badge-success',

                            'CANCELLED' =>
                                'badge-danger',

                            'REFUNDED' =>
                                'badge-dark',

                            default =>
                                'badge-light',
                        };

                        $label =
                            Order::ORDER_STATUSES[$status]
                            ?? $status
                            ?: 'N/A';

                        return '<span class="badge '
                            . $badgeClass
                            . '">'
                            . e($label)
                            . '</span>';
                    }
                )

                /*
                |--------------------------------------------------------------------------
                | Created At
                |--------------------------------------------------------------------------
                */
                ->editColumn(
                    'created_at',
                    function ($order) {

                        if (!$order->created_at) {
                            return '-';
                        }

                        return $order->created_at
                            ->format('d M Y h:i A');
                    }
                )

                /*
                |--------------------------------------------------------------------------
                | Actions
                |--------------------------------------------------------------------------
                */
                ->addColumn(
                    'actions',
                    function ($order) {

                        $buttons =
                            '<div class="btn-group" role="group">';

                        /*
                        |--------------------------------------------------------------------------
                        | View
                        |--------------------------------------------------------------------------
                        */
                        $buttons .= '
                            <a href="' .
                            route(
                                'admin.orders.show',
                                $order->id
                            ) .
                            '"
                               class="btn btn-sm btn-info"
                               title="View Order">
                                <i class="fas fa-eye"></i>
                            </a>
                        ';

                        /*
                        |--------------------------------------------------------------------------
                        | Edit
                        |--------------------------------------------------------------------------
                        */
                        $canUpdate = true;

                        if (method_exists($order, 'canUpdate')) {
                            $canUpdate =
                                $order->canUpdate();
                        }

                        if ($canUpdate) {

                            $buttons .= '
                                <a href="' .
                                route(
                                    'admin.orders.edit',
                                    $order->id
                                ) .
                                '"
                                   class="btn btn-sm btn-primary"
                                   title="Edit Order">
                                    <i class="fas fa-edit"></i>
                                </a>
                            ';
                        }

                        /*
                        |--------------------------------------------------------------------------
                        | Print
                        |--------------------------------------------------------------------------
                        */
                        $buttons .= '
                            <a href="' .
                            route(
                                'admin.orders.print',
                                $order->id
                            ) .
                            '"
                               target="_blank"
                               class="btn btn-sm btn-secondary"
                               title="Print Invoice">
                                <i class="fas fa-print"></i>
                            </a>
                        ';

                        /*
                        |--------------------------------------------------------------------------
                        | Cancel
                        |--------------------------------------------------------------------------
                        */
                        $canCancel = false;

                        if (method_exists($order, 'canCancel')) {
                            $canCancel =
                                $order->canCancel();
                        }

                        if ($canCancel) {

                            $buttons .= '
                                <button type="button"
                                        class="btn btn-sm btn-danger cancel-order"
                                        data-id="' .
                                        $order->id .
                                        '"
                                        title="Cancel Order">
                                    <i class="fas fa-times"></i>
                                </button>
                            ';
                        }

                        $buttons .= '</div>';

                        return $buttons;
                    }
                )

                /*
                |--------------------------------------------------------------------------
                | Server-side Search
                |--------------------------------------------------------------------------
                */
                ->filterColumn(
                    'customer_name',
                    function ($query, $keyword) {

                        $query->where(function ($q) use ($keyword) {

                            $q->where(
                                'orders.shipping_name',
                                'like',
                                "%{$keyword}%"
                            )
                            ->orWhereHas(
                                'customer',
                                function ($customerQuery) use ($keyword) {

                                    $customerQuery->where(
                                        'name',
                                        'like',
                                        "%{$keyword}%"
                                    );
                                }
                            );
                        });
                    }
                )

                ->filterColumn(
                    'customer_phone',
                    function ($query, $keyword) {

                        $query->where(function ($q) use ($keyword) {

                            $q->where(
                                'orders.shipping_phone',
                                'like',
                                "%{$keyword}%"
                            )
                            ->orWhereHas(
                                'customer',
                                function ($customerQuery) use ($keyword) {

                                    $customerQuery->where(
                                        'phone_number',
                                        'like',
                                        "%{$keyword}%"
                                    );
                                }
                            );
                        });
                    }
                )

                /*
                |--------------------------------------------------------------------------
                | HTML Columns
                |--------------------------------------------------------------------------
                */
                ->rawColumns([
                    'order_number',
                    'products_html',
                    'payment_status_badge',
                    'status_badge',
                    'actions',
                ])

                ->make(true);
        }

        /*
        |--------------------------------------------------------------------------
        | Status Lists
        |--------------------------------------------------------------------------
        */
        $orderStatuses =
            Order::ORDER_STATUSES;

        $paymentStatuses =
            Order::PAYMENT_STATUSES;

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */
        $totalOrders =
            Order::count();

        $pendingOrders =
            Order::pending()->count();

        $processingOrders =
            Order::processing()->count();

        $completedOrders =
            Order::completed()->count();

        $cancelledOrders =
            Order::cancelled()->count();

        $totalRevenue =
            Order::where(
                'order_status',
                'DELIVERED'
            )->sum('grand_total');

        return view(
            'admin.orders.index',
            compact(
                'orderStatuses',
                'paymentStatuses',
                'totalOrders',
                'pendingOrders',
                'processingOrders',
                'completedOrders',
                'cancelledOrders',
                'totalRevenue'
            )
        );
    }


    /**
     * Show create form.
     */
    public function create()
    {
        $customers = Customer::orderBy('name')
            ->get([
                'id',
                'name',
                'phone_number',
                'email',
            ]);

        $coupons = Coupon::where(
            'is_active',
            true
        )
        ->where(function ($query) {

            $query->whereNull('valid_from')
                ->orWhere(
                    'valid_from',
                    '<=',
                    now()
                );
        })
        ->where(function ($query) {

            $query->whereNull('valid_to')
                ->orWhere(
                    'valid_to',
                    '>=',
                    now()
                );
        })
        ->orderBy('coupon_code')
        ->get([
            'id',
            'coupon_code',
            'coupon_type',
            'discount_value',
            'minimum_order_amount',
            'max_discount_amount',
        ]);

        $products = Product::orderBy('name')
            ->get([
                'id',
                'name',
                'sale_price',
                'stock_quantity',
            ]);

        $orderStatuses =
            Order::ORDER_STATUSES;

        $paymentStatuses =
            Order::PAYMENT_STATUSES;

        $paymentMethods =
            Order::PAYMENT_METHODS;

        return view(
            'admin.orders.create',
            compact(
                'customers',
                'coupons',
                'products',
                'orderStatuses',
                'paymentStatuses',
                'paymentMethods'
            )
        );
    }


    /**
     * Store order with items.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            $this->orderRules()
        );

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            DB::beginTransaction();

            $coupon = null;

            if ($request->filled('coupon_id')) {

                $coupon = Coupon::where(
                    'id',
                    $request->coupon_id
                )
                ->where(
                    'is_active',
                    true
                )
                ->first();

                if (!$coupon) {

                    DB::rollBack();

                    return redirect()
                        ->back()
                        ->with(
                            'error',
                            'Selected coupon is not active.'
                        )
                        ->withInput();
                }
            }

            $order = new Order();

            $order->order_number =
                'ORD-'
                . strtoupper(
                    Str::random(10)
                )
                . '-'
                . date('Ymd');

            $order->user_id =
                auth()->id();

            $order->customer_id =
                $request->customer_id;

            $order->coupon_id =
                $coupon?->id;

            $order->coupon_code =
                $coupon?->coupon_code;

            $order->shipping_name =
                $request->shipping_name;

            $order->shipping_phone =
                $request->shipping_phone;

            $order->shipping_email =
                $request->shipping_email;

            $order->shipping_address =
                $request->shipping_address;

            $order->district_name =
                $request->district_name;

            $order->thana_name =
                $request->thana_name;

            $order->payment_method =
                $request->payment_method;

            $order->payment_status =
                $request->payment_status;

            $order->order_status =
                $request->order_status;

            $order->subtotal =
                $request->subtotal;

            $order->shipping_fee =
                $request->shipping_fee ?? 0;

            $order->discount_amount =
                $request->discount_amount ?? 0;

            $order->grand_total =
                $request->grand_total;

            $order->order_note =
                $request->order_note;

            $order->ip_address =
                $request->ip();

            $order->paid_at =
                $request->paid_at;

            $order->shipped_at =
                $request->shipped_at;

            $order->delivered_at =
                $request->delivered_at;

            if (
                $request->payment_status === 'PAID'
                && !$order->paid_at
            ) {
                $order->paid_at = now();
            }

            if (
                $request->order_status === 'SHIPPED'
                && !$order->shipped_at
            ) {
                $order->shipped_at = now();
            }

            if (
                $request->order_status === 'DELIVERED'
                && !$order->delivered_at
            ) {
                $order->delivered_at = now();
            }

            $order->save();

            /*
            |--------------------------------------------------------------------------
            | Save Order Items
            |--------------------------------------------------------------------------
            */
            if ($request->has('items') && is_array($request->items)) {

                foreach ($request->items as $itemData) {

                    if (empty($itemData['product_id']) && empty($itemData['product_name'])) {
                        continue;
                    }

                    $orderItem = new OrderItem();

                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $itemData['product_id'] ?? null;
                    $orderItem->product_name = $itemData['product_name'] ?? 'Product';
                    $orderItem->quantity = $itemData['quantity'] ?? 1;
                    $orderItem->unit_price = $itemData['unit_price'] ?? 0;
                    $orderItem->discount_amount = $itemData['discount_amount'] ?? 0;
                    $orderItem->total_price = ($itemData['unit_price'] ?? 0) * ($itemData['quantity'] ?? 1) - ($itemData['discount_amount'] ?? 0);

                    $orderItem->save();

                    /*
                    |--------------------------------------------------------------------------
                    | Update Product Stock
                    |--------------------------------------------------------------------------
                    */
                    if (!empty($itemData['product_id'])) {

                        $product = Product::find($itemData['product_id']);

                        if ($product && $product->stock_quantity !== null) {

                            $product->stock_quantity =
                                max(0, $product->stock_quantity - ($itemData['quantity'] ?? 1));

                            $product->save();
                        }
                    }
                }
            }

            if ($coupon) {
                $this->incrementCouponUsage($coupon);
            }

            DB::commit();

            return redirect()
                ->route('admin.orders.index')
                ->with(
                    'success',
                    'Order created successfully! Order Number: '
                    . $order->order_number
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Failed to create order. '
                    . $e->getMessage()
                )
                ->withInput();
        }
    }


    /**
     * Display order with items.
     */
    public function show(string $id)
    {
        $order = Order::with([
            'customer',
            'user',
            'items.product',
            'coupon',
        ])->findOrFail($id);

        return view(
            'admin.orders.show',
            compact('order')
        );
    }


    /**
     * Edit order with items.
     */
    public function edit(string $id)
    {
        $order = Order::with([
            'customer',
            'coupon',
            'items',
        ])->findOrFail($id);

        if (
            method_exists($order, 'canUpdate')
            && !$order->canUpdate()
        ) {

            return redirect()
                ->route('admin.orders.index')
                ->with(
                    'error',
                    'This order cannot be edited.'
                );
        }

        $customers = Customer::orderBy('name')
            ->get([
                'id',
                'name',
                'phone_number',
                'email',
            ]);

        $coupons = Coupon::where(
            'is_active',
            true
        )
        ->where(function ($query) {

            $query->whereNull('valid_from')
                ->orWhere(
                    'valid_from',
                    '<=',
                    now()
                );
        })
        ->where(function ($query) {

            $query->whereNull('valid_to')
                ->orWhere(
                    'valid_to',
                    '>=',
                    now()
                );
        })
        ->orderBy('coupon_code')
        ->get([
            'id',
            'coupon_code',
            'coupon_type',
            'discount_value',
            'minimum_order_amount',
            'max_discount_amount',
        ]);

        $products = Product::orderBy('name')
            ->get([
                'id',
                'name',
                'sale_price',
                'stock_quantity',
            ]);

        $orderStatuses =
            Order::ORDER_STATUSES;

        $paymentStatuses =
            Order::PAYMENT_STATUSES;

        $paymentMethods =
            Order::PAYMENT_METHODS;

        return view(
            'admin.orders.edit',
            compact(
                'order',
                'customers',
                'coupons',
                'products',
                'orderStatuses',
                'paymentStatuses',
                'paymentMethods'
            )
        );
    }


    /**
     * Update order with items.
     */
    public function update(
        Request $request,
        string $id
    ) {
        $order = Order::findOrFail($id);

        if (
            method_exists($order, 'canUpdate')
            && !$order->canUpdate()
        ) {

            return redirect()
                ->route('admin.orders.index')
                ->with(
                    'error',
                    'This order cannot be updated.'
                );
        }

        $validator = Validator::make(
            $request->all(),
            $this->orderRules()
        );

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            DB::beginTransaction();

            $oldCouponId =
                $order->coupon_id;

            $newCoupon = null;

            if ($request->filled('coupon_id')) {

                $newCoupon = Coupon::where(
                    'id',
                    $request->coupon_id
                )
                ->where(
                    'is_active',
                    true
                )
                ->first();

                if (!$newCoupon) {

                    DB::rollBack();

                    return redirect()
                        ->back()
                        ->with(
                            'error',
                            'Selected coupon is not active.'
                        )
                        ->withInput();
                }
            }

            $order->customer_id =
                $request->customer_id;

            $order->coupon_id =
                $newCoupon?->id;

            $order->coupon_code =
                $newCoupon?->coupon_code;

            $order->shipping_name =
                $request->shipping_name;

            $order->shipping_phone =
                $request->shipping_phone;

            $order->shipping_email =
                $request->shipping_email;

            $order->shipping_address =
                $request->shipping_address;

            $order->district_name =
                $request->district_name;

            $order->thana_name =
                $request->thana_name;

            $order->payment_method =
                $request->payment_method;

            $order->payment_status =
                $request->payment_status;

            $order->order_status =
                $request->order_status;

            $order->subtotal =
                $request->subtotal;

            $order->shipping_fee =
                $request->shipping_fee ?? 0;

            $order->discount_amount =
                $request->discount_amount ?? 0;

            $order->grand_total =
                $request->grand_total;

            $order->order_note =
                $request->order_note;

            $order->paid_at =
                $request->paid_at;

            $order->shipped_at =
                $request->shipped_at;

            $order->delivered_at =
                $request->delivered_at;

            if (
                $request->payment_status === 'PAID'
                && !$order->paid_at
            ) {
                $order->paid_at = now();
            }

            if (
                $request->order_status === 'SHIPPED'
                && !$order->shipped_at
            ) {
                $order->shipped_at = now();
            }

            if (
                $request->order_status === 'DELIVERED'
                && !$order->delivered_at
            ) {
                $order->delivered_at = now();
            }

            $order->save();

            /*
            |--------------------------------------------------------------------------
            | Update Order Items
            |--------------------------------------------------------------------------
            */
            if ($request->has('items') && is_array($request->items)) {

                // Delete existing items
                $order->items()->delete();

                foreach ($request->items as $itemData) {

                    if (empty($itemData['product_id']) && empty($itemData['product_name'])) {
                        continue;
                    }

                    $orderItem = new OrderItem();

                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $itemData['product_id'] ?? null;
                    $orderItem->product_name = $itemData['product_name'] ?? 'Product';
                    $orderItem->quantity = $itemData['quantity'] ?? 1;
                    $orderItem->unit_price = $itemData['unit_price'] ?? 0;
                    $orderItem->discount_amount = $itemData['discount_amount'] ?? 0;
                    $orderItem->total_price = ($itemData['unit_price'] ?? 0) * ($itemData['quantity'] ?? 1) - ($itemData['discount_amount'] ?? 0);

                    $orderItem->save();

                    /*
                    |--------------------------------------------------------------------------
                    | Update Product Stock
                    |--------------------------------------------------------------------------
                    */
                    if (!empty($itemData['product_id'])) {

                        $product = Product::find($itemData['product_id']);

                        if ($product && $product->stock_quantity !== null) {

                            $product->stock_quantity =
                                max(0, $product->stock_quantity - ($itemData['quantity'] ?? 1));

                            $product->save();
                        }
                    }
                }
            }

            /*
            |--------------------------------------------------------------------------
            | Coupon Usage
            |--------------------------------------------------------------------------
            */
            if ($oldCouponId != $order->coupon_id) {

                if ($oldCouponId) {

                    $oldCoupon =
                        Coupon::find(
                            $oldCouponId
                        );

                    if ($oldCoupon) {
                        $this->decrementCouponUsage(
                            $oldCoupon
                        );
                    }
                }

                if ($newCoupon) {
                    $this->incrementCouponUsage(
                        $newCoupon
                    );
                }
            }

            DB::commit();

            return redirect()
                ->route('admin.orders.index')
                ->with(
                    'success',
                    'Order updated successfully! Order Number: '
                    . $order->order_number
                );

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Failed to update order. '
                    . $e->getMessage()
                )
                ->withInput();
        }
    }


    /**
     * Delete order with items.
     */
    public function destroy(string $id)
    {
        try {

            DB::beginTransaction();

            $order =
                Order::with('items')->findOrFail($id);

            $isPending = true;

            if (method_exists($order, 'isPending')) {
                $isPending =
                    $order->isPending();
            }

            if (!$isPending) {

                DB::rollBack();

                return response()->json([
                    'success' => false,
                    'message' =>
                        'Only pending orders can be deleted.',
                ], 400);
            }

            // Restore product stock
            foreach ($order->items as $item) {

                if ($item->product_id) {

                    $product = Product::find($item->product_id);

                    if ($product && $product->stock_quantity !== null) {

                        $product->stock_quantity += $item->quantity;
                        $product->save();
                    }
                }
            }

            $order->items()->delete();

            if ($order->coupon_id) {

                $coupon =
                    Coupon::find(
                        $order->coupon_id
                    );

                if ($coupon) {
                    $this->decrementCouponUsage(
                        $coupon
                    );
                }
            }

            $order->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' =>
                    'Order deleted successfully!',
            ]);

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            return response()->json([
                'success' => false,
                'message' =>
                    'Failed to delete order.',
            ], 500);
        }
    }


    /**
     * Update order status.
     */
    public function updateStatus(
        Request $request,
        string $id
    ) {
        $validator = Validator::make(
            $request->all(),
            [
                'order_status' => [
                    'required',
                    'string',
                    'in:' . implode(
                        ',',
                        array_keys(
                            Order::ORDER_STATUSES
                        )
                    ),
                ],
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' =>
                    $validator->errors()->first(),
            ], 422);
        }

        try {

            $order =
                Order::findOrFail($id);

            if (
                method_exists($order, 'canUpdate')
                && !$order->canUpdate()
                && $request->order_status !== 'CANCELLED'
            ) {

                return response()->json([
                    'success' => false,
                    'message' =>
                        'This order cannot be updated.',
                ], 400);
            }

            $newStatus =
                $request->order_status;

            $order->order_status =
                $newStatus;

            if (
                $newStatus === 'SHIPPED'
                && !$order->shipped_at
            ) {
                $order->shipped_at = now();
            }

            if (
                $newStatus === 'DELIVERED'
                && !$order->delivered_at
            ) {
                $order->delivered_at = now();
            }

            $order->save();

            return response()->json([
                'success' => true,
                'message' =>
                    'Order status updated successfully!',
                'status_badge' =>
                    method_exists(
                        $order,
                        'getStatusBadgeAttribute'
                    )
                        ? $order->status_badge
                        : null,
            ]);

        } catch (\Throwable $e) {

            report($e);

            return response()->json([
                'success' => false,
                'message' =>
                    'Failed to update order status.',
            ], 500);
        }
    }


    /**
     * Cancel order.
     */
    public function cancel(
        Request $request,
        string $id
    ) {
        try {

            DB::beginTransaction();

            $order =
                Order::findOrFail($id);

            $canCancel = false;

            if (method_exists($order, 'canCancel')) {
                $canCancel =
                    $order->canCancel();
            }

            if (!$canCancel) {

                DB::rollBack();

                return response()->json([
                    'success' => false,
                    'message' =>
                        'This order cannot be cancelled.',
                ], 400);
            }

            $order->order_status =
                'CANCELLED';

            $order->save();

            // Restore product stock for cancelled order
            foreach ($order->items as $item) {

                if ($item->product_id) {

                    $product = Product::find($item->product_id);

                    if ($product && $product->stock_quantity !== null) {

                        $product->stock_quantity += $item->quantity;
                        $product->save();
                    }
                }
            }

            if ($order->coupon_id) {

                $coupon =
                    Coupon::find(
                        $order->coupon_id
                    );

                if ($coupon) {
                    $this->decrementCouponUsage(
                        $coupon
                    );
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' =>
                    'Order cancelled successfully!',
            ]);

        } catch (\Throwable $e) {

            DB::rollBack();

            report($e);

            return response()->json([
                'success' => false,
                'message' =>
                    'Failed to cancel order.',
            ], 500);
        }
    }


    /**
     * Print invoice.
     */
    public function print(string $id)
    {
        $order = Order::with([
            'customer',
            'user',
            'items.product',
            'coupon',
        ])->findOrFail($id);

        return view(
            'admin.orders.print',
            compact('order')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Validation Rules
    |--------------------------------------------------------------------------
    */

    private function orderRules(): array
    {
        return [

            'customer_id' => [
                'nullable',
                'exists:customers,id',
            ],

            'shipping_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'shipping_phone' => [
                'nullable',
                'string',
                'max:30',
            ],

            'shipping_email' => [
                'nullable',
                'email',
                'max:100',
            ],

            'shipping_address' => [
                'nullable',
                'string',
            ],

            'district_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'thana_name' => [
                'nullable',
                'string',
                'max:100',
            ],

            'payment_method' => [
                'required',
                'string',
                'in:COD,BKASH,NAGAD,ROCKET,CARD,BANK',
            ],

            'payment_status' => [
                'required',
                'string',
                'in:PENDING,PAID,FAILED,REFUNDED',
            ],

            'order_status' => [
                'required',
                'string',
                'in:' . implode(
                    ',',
                    array_keys(
                        Order::ORDER_STATUSES
                    )
                ),
            ],

            'subtotal' => [
                'required',
                'numeric',
                'min:0',
            ],

            'shipping_fee' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'discount_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'grand_total' => [
                'required',
                'numeric',
                'min:0',
            ],

            'coupon_id' => [
                'nullable',
                'exists:coupons,id',
            ],

            'coupon_code' => [
                'nullable',
                'string',
                'max:50',
            ],

            'order_note' => [
                'nullable',
                'string',
            ],

            'paid_at' => [
                'nullable',
                'date',
            ],

            'shipped_at' => [
                'nullable',
                'date',
            ],

            'delivered_at' => [
                'nullable',
                'date',
            ],

            /*
            |--------------------------------------------------------------------------
            | Order Items Validation
            |--------------------------------------------------------------------------
            */
            'items' => [
                'nullable',
                'array',
            ],

            'items.*.product_id' => [
                'nullable',
                'exists:products,id',
            ],

            'items.*.product_name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'items.*.quantity' => [
                'nullable',
                'integer',
                'min:1',
            ],

            'items.*.unit_price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'items.*.discount_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],
        ];
    }


    /*
    |--------------------------------------------------------------------------
    | Coupon Helpers
    |--------------------------------------------------------------------------
    */

    private function incrementCouponUsage(
        Coupon $coupon
    ): void {

        if (
            array_key_exists(
                'used_count',
                $coupon->getAttributes()
            )
        ) {
            $coupon->increment(
                'used_count'
            );
        }
    }


    private function decrementCouponUsage(
        Coupon $coupon
    ): void {

        if (
            array_key_exists(
                'used_count',
                $coupon->getAttributes()
            )
        ) {

            $currentUsage =
                (int) $coupon->used_count;

            if ($currentUsage > 0) {

                $coupon->decrement(
                    'used_count'
                );
            }
        }
    }
}