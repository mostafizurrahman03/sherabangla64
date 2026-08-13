<?php
namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(CartController $cartController)
    {
        $cart = $cartController->currentCartPublic();

        return view('checkout.index', ['cart' => $cart]);
    }

    public function store(Request $request, CartController $cartController)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:120',
            'phone' => 'required|string|max:20',
            'address_line' => 'required|string|max:255',
            'city' => 'required|string|max:60',
            'area' => 'nullable|string|max:60',
            'payment_method' => 'required|in:cod,bkash,card',
            'coupon_code' => 'nullable|string',
            'note' => 'nullable|string',
        ]);

        $cart = $cartController->currentCartPublic();

        if ($cart->items->isEmpty()) {
            return back()->withErrors(['cart' => 'আপনার কার্ট খালি']);
        }

        $subtotal = $cart->subtotal;
        $shipping = $subtotal >= 500 ? 0 : 60;
        $discount = 0;

        if (! empty($validated['coupon_code'])) {
            $coupon = Coupon::where('code', $validated['coupon_code'])->first();
            if ($coupon && $coupon->isValidFor($subtotal)) {
                $discount = $coupon->discountFor($subtotal);
            }
        }

        $order = DB::transaction(function () use ($validated, $cart, $subtotal, $shipping, $discount) {
            $order = Order::create([
                'order_number' => Order::generateOrderNumber(),
                'user_id' => Auth::id(),
                'full_name' => $validated['full_name'],
                'phone' => $validated['phone'],
                'address_line' => $validated['address_line'],
                'city' => $validated['city'],
                'area' => $validated['area'] ?? null,
                'payment_method' => $validated['payment_method'],
                'payment_status' => $validated['payment_method'] === 'cod' ? 'pending' : 'unpaid',
                'status' => 'processing',
                'subtotal' => $subtotal,
                'shipping_fee' => $shipping,
                'discount' => $discount,
                'total' => max(0, $subtotal + $shipping - $discount),
                'coupon_code' => $validated['coupon_code'] ?? null,
                'note' => $validated['note'] ?? null,
            ]);

            foreach ($cart->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_name' => $item->product->name,
                    'quantity' => $item->quantity,
                    'unit_price' => $item->unit_price,
                    'line_total' => $item->quantity * $item->unit_price,
                ]);
            }

            $cart->items()->delete();

            return $order;
        });

        return redirect()->route('orders.success', $order->order_number);
    }
}
