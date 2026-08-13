@extends('layouts.app')
@section('title', 'Checkout | Sera Bangla')

@section('content')
<main>
  <div class="container">
    <div class="pagehead"><b>Checkout</b></div>
    @php $ship = $cart->subtotal >= 500 ? 0 : 60; @endphp
    <form action="{{ route('checkout.store') }}" method="POST">
      @csrf
      <div class="checkout-layout">
        <div>
          <div class="form-card">
            <h3><span class="num">1</span>Delivery Information</h3>
            <div class="form-grid">
              <div class="field"><label>Full Name</label><input name="full_name" value="{{ old('full_name') }}" placeholder="e.g. Rahim Uddin" required></div>
              <div class="field"><label>Mobile Number</label><input name="phone" value="{{ old('phone') }}" placeholder="01XXXXXXXXX" required></div>
            </div>
            <div class="form-grid full" style="margin-top:14px;">
              <div class="field"><label>Full Address</label><textarea name="address_line" rows="2" placeholder="House/Holding, Road, Area" required>{{ old('address_line') }}</textarea></div>
            </div>
            <div class="form-grid" style="margin-top:14px;">
              <div class="field"><label>City</label>
                <select name="city">
                  @foreach(['Dhaka','Chattogram','Sylhet','Rajshahi','Khulna'] as $city)
                    <option {{ old('city')===$city?'selected':'' }}>{{ $city }}</option>
                  @endforeach
                </select>
              </div>
              <div class="field"><label>Area</label><input name="area" value="{{ old('area') }}" placeholder="e.g. Dhanmondi"></div>
            </div>
          </div>
          <div class="form-card">
            <h3><span class="num">2</span>Payment Method</h3>
            <div class="pay-opts">
              <label class="pay-opt selected"><input type="radio" name="payment_method" value="cod" checked><span class="em">💵</span><span><strong>Cash on Delivery</strong><span>Pay when you receive the product</span></span></label>
              <label class="pay-opt"><input type="radio" name="payment_method" value="bkash"><span class="em">📱</span><span><strong>bKash</strong><span>Pay using your bKash account</span></span></label>
              <label class="pay-opt"><input type="radio" name="payment_method" value="card"><span class="em">💳</span><span><strong>Card Payment</strong><span>Visa / Mastercard</span></span></label>
            </div>
          </div>
          <div class="form-card">
            <h3><span class="num">3</span>Order Note (optional)</h3>
            <textarea name="note" rows="2" placeholder="Any delivery instructions?">{{ old('note') }}</textarea>
          </div>
        </div>
        <div class="summary-box">
          <h3>Order Summary</h3>
          @foreach($cart->items as $item)
            <div class="mini-item"><span>{{ $item->product->name }} × {{ $item->quantity }}</span><span>৳{{ number_format($item->line_total) }}</span></div>
          @endforeach
          <div class="coupon"><input type="text" name="coupon_code" placeholder="Promo code"></div>
          <div class="sum-line"><span>Subtotal</span><span>৳{{ number_format($cart->subtotal) }}</span></div>
          <div class="sum-line"><span>Delivery Fee</span><span>{{ $ship === 0 ? 'Free' : '৳' . $ship }}</span></div>
          <div class="sum-line total"><span>Total</span><span>৳{{ number_format($cart->subtotal + $ship) }}</span></div>
          <button class="btn danger block" type="submit" style="margin-top:14px;">Confirm Order</button>
        </div>
      </div>
    </form>
  </div>
</main>
<script>
document.querySelectorAll('.pay-opt').forEach(function(el){
  el.addEventListener('click', function(){
    document.querySelectorAll('.pay-opt').forEach(function(x){x.classList.remove('selected');});
    el.classList.add('selected');
    el.querySelector('input').checked = true;
  });
});
</script>
@endsection
