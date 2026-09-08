<?php
namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function success(string $orderNumber)
    {
        $order = Order::with('items')->where('order_number', $orderNumber)->firstOrFail();

        return view('orders.success', compact('order'));
    }
    // অর্ডার ট্র্যাক পেজ দেখানোর জন্য (Form view)
    public function trackForm()
    {
        return view('orders.track');
    }

    // অর্ডার ট্র্যাক করার ডাটা প্রসেস করার জন্য
    public function trackResult(Request $request)
    {
        $request->validate([
            'order_number' => 'required|string',
        ]);

        $order = Order::with('items')
            ->where('order_number', $request->order_number)
            ->first();

        if (!$order) {
            return back()->with('error', 'Sorry, no order found with this order number.');
        }
        return view('orders.track', compact('order'));
    }
    public function myOrders()
    {
        $orders = Order::where('user_id', auth()->id())->latest()->paginate(10);

        return view('orders.index', compact('orders'));
    }
}