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

        if (! session()->has('cart_session_id')) {
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
        return $this->currentCart()->load('items.product');
    }

    public function index()
    {
        $cart = $this->currentCartPublic();

        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        $request->validate(['quantity' => 'nullable|integer|min:1']);
        $cart = $this->currentCart();

        $item = CartItem::firstOrNew(['cart_id' => $cart->id, 'product_id' => $product->id]);
        $item->unit_price = $product->price;
        $item->quantity = ($item->exists ? $item->quantity : 0) + ($request->quantity ?? 1);
        $item->save();

        return back()->with('success', $product->name . ' কার্টে যোগ হয়েছে');
    }

    public function update(Request $request, CartItem $item)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        $item->update(['quantity' => $request->quantity]);

        return back();
    }

    public function remove(CartItem $item)
    {
        $item->delete();

        return back()->with('success', 'পণ্য কার্ট থেকে সরানো হয়েছে');
    }
}
