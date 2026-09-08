<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected function currentCart(): Cart
    {
        if (Auth::check()) {
            return Cart::firstOrCreate(['user_id' => Auth::id()]);
        }

        if (!session()->has('cart_session_id')) {
            session()->put('cart_session_id', (string) str()->uuid());
        }

        return Cart::firstOrCreate(['session_id' => session('cart_session_id')]);
    }

    /**
     * Public accessor so other controllers (e.g. CheckoutController) can reuse
     * the same cart resolution logic without duplicating it.
     */
    public function currentCartPublic(): Cart
    {
        return $this->currentCart()->load(['items.product']);
    }

    public function index()
    {
        $cart = $this->currentCartPublic();
        return view('cart.index', compact('cart'));
    }

    // ===== ADD TO CART =====
    public function add(Request $request, Product $product)
    {
        $request->validate(['quantity' => 'nullable|integer|min:1']);

        $cart = $this->currentCart();
        $quantity = $request->quantity ?? 1;

        // Find or create cart item
        $item = CartItem::firstOrNew([
            'cart_id' => $cart->id,
            'product_id' => $product->id
        ]);

        $item->unit_price = $product->current_price;
        $item->quantity = ($item->exists ? $item->quantity : 0) + $quantity;
        $item->save();

        $cart->refresh();
        $cart->load(['items.product']);

        // Calculate totals
        $globalCartCount = $cart->items->sum('quantity');
        $globalCartTotal = $cart->items->sum(function ($i) {
            return $i->unit_price * $i->quantity;
        });

        // For AJAX request
        if ($request->ajax() || $request->expectsJson()) {
            // Get cart items HTML for quick view
            $cartHtml = view('partial.cart-items', compact('cart'))->render();

            return response()->json([
                'success' => true,
                'message' => $product->name . ' কার্টে যোগ হয়েছে',
                'count' => $globalCartCount,
                'total' => $globalCartTotal,
                'subtotal' => $globalCartTotal,
                'items_count' => $globalCartCount,
                'cart_html' => $cartHtml,
                'cart' => $cart
            ]);
        }

        return back()->with('success', $product->name . ' কার্টে যোগ হয়েছে');
    }

    // ===== UPDATE QUANTITY =====
    public function update(Request $request, $itemId)
    {
        // Fix: Accept item ID from request
        $item = CartItem::findOrFail($itemId);

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $item->update(['quantity' => $request->quantity]);

        // Get cart with items
        $cart = $item->cart;
        $cart->refresh();
        $cart->load('items.product');

        // Calculate totals
        $globalCartCount = $cart->items->sum('quantity');
        $globalCartTotal = $cart->items->sum(function ($i) {
            return $i->unit_price * $i->quantity;
        });

        // For AJAX request
        if ($request->ajax() || $request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'কার্ট আপডেট হয়েছে',
                'count' => $globalCartCount,
                'total' => $globalCartTotal,
                'subtotal' => $globalCartTotal,
                'items_count' => $globalCartCount
            ]);
        }

        return back()->with('success', 'কার্ট আপডেট হয়েছে');
    }

    // ===== REMOVE FROM CART =====
    public function remove(Request $request, $itemId)
    {
        $item = CartItem::findOrFail($itemId);
        $cart = $item->cart;

        $item->delete();

        // Refresh cart
        $cart->refresh();
        $cart->load('items.product');

        // Calculate totals
        $globalCartCount = $cart->items->sum('quantity');
        $globalCartTotal = $cart->items->sum(function ($i) {
            return $i->unit_price * $i->quantity;
        });

        // For AJAX request
        if ($request->ajax() || $request->expectsJson()) {
            // Get updated cart HTML
            $cartHtml = $globalCartCount > 0
                ? view('partial.cart-items', compact('cart'))->render()
                : null;

            return response()->json([
                'success' => true,
                'message' => 'পণ্য কার্ট থেকে সরানো হয়েছে',
                'count' => $globalCartCount,
                'total' => $globalCartTotal,
                'subtotal' => $globalCartTotal,
                'items_count' => $globalCartCount,
                'cart_html' => $cartHtml
            ]);
        }

        return back()->with('success', 'পণ্য কার্ট থেকে সরানো হয়েছে');
    }

    // ===== GET CART ITEMS (for AJAX refresh) =====
    public function getItems(Request $request)
    {
        $cart = $this->currentCartPublic();

        if ($request->ajax() || $request->expectsJson()) {
            $html = view('partial.cart-items', compact('cart'))->render();

            return response()->json([
                'success' => true,
                'html' => $html,
                'count' => $cart->items->sum('quantity'),
                'total' => $cart->items->sum(function ($i) {
                    return $i->unit_price * $i->quantity;
                })
            ]);
        }

        return response()->json(['success' => false]);
    }
}