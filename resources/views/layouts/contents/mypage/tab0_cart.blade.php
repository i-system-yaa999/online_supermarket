{{-- mypage.blade.php にてinclude --}}

{{-- カート --}}
<div class="tab_content" id="tab0_content">
  
  
  <div class="my_content_nav">
    <h3>カート内商品</h3>
    <p>価格はすべて税込みです</p>
  </div>
  {{-- コンテンツ --}}
  <div class="my_content_data">
    @if(count($carts) > 0)
    <table class="cart_list">
      <thead>
        <tr>
          <th class="">商品</th>
          <th class="">品名</th>
          <th class="">個数　　　　</th>
          <th class="">価格</th>
          <th class="">削除　</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($carts as $cart)
        <tr>
          <td class="product_image"><img src="{{$cart->product->image}}" alt="Thumbnail"></td>
          <td class="product_name"><p>{{$cart->product->name}}</p></td>
          <td class="product_quantity">
            <form class="product_form" action="{{ route('cart.update') }}" method="POST">
              @csrf
              <input type="hidden" name="id" value="{{$cart->id}}">
              {{-- <input type="number" name="quantity" value="{{$cart->quantity}}"> --}}
              <select name="quantity" id="quantity">
                <option value="{{$cart->quantity}}">個数：{{$cart->quantity}}</option>
                @for($i = 1; $i <= 50; $i++)
                  <option value="{{$i}}">{{$i}}</option>
                @endfor
              </select>
              <button type="submit" class="btn btn_qty_change">更新</button>
            </form>
          </td>
          <td class="product_price"><p>{{$cart->product->price}}円</p></td>
          <td class="product_delete">
            <form action="{{route('cart.remove')}}" method="POST">
              @csrf
              <input type="hidden" value="{{$cart->id}}" name="id">
              <button type="submit" class="btn btn_item_delete">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
    <div class="total">
      <form action="{{ route('cart.clear') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn_all_clear">カートを空にする</button>
      </form>
      <div class="total_price">合計： {{\app\Models\Cart::total()}}円</div>
    </div>


    <div class="delivery">
      @if(isset($delivery))
      <p>配達予約済み：第{{$delivery->delivery_number}}便</p>
      @else
      <p>配達希望時間を選択してください。</p>
      @endif
      <div class="delivery_time">
        <form action="/delivery" method="POST">
          @csrf
          <ul class="">
            <li class="delivery_item"><input type="radio" name="delivery_number" id="" value="0" @if(($delivery_number ?? 0) == 0) checked @endif>店舗で受け取る</li>
            <li class="delivery_item"><input type="radio" name="delivery_number" id="" value="1" @if(($delivery_number ?? 0) == 1) checked @endif>第1便：10:00 ～ 12:00</li>
            <li class="delivery_item"><input type="radio" name="delivery_number" id="" value="2" @if(($delivery_number ?? 0) == 2) checked @endif>第2便：12:00 ～ 14:00</li>
            <li class="delivery_item"><input type="radio" name="delivery_number" id="" value="3" @if(($delivery_number ?? 0) == 3) checked @endif>第3便：14:00 ～ 16:00</li>
            <li class="delivery_item"><input type="radio" name="delivery_number" id="" value="4" @if(($delivery_number ?? 0) == 4) checked @endif>第4便：16:00 ～ 18:00</li>
            <li class="delivery_item"><input type="radio" name="delivery_number" id="" value="5" @if(($delivery_number ?? 0) == 5) checked @endif>第5便：18:00 ～ 20:00</li>
          </ul>
          <button type="submit" class="btn btn_delivery">@if(isset($delivery)) 配達便を変更する @else 配達便を決定する @endif</button>
        </form>
      </div>
    </div>

    <div class="charge">
      <form action="{{asset('/charge')}}" method="POST">
        @csrf
        <input type="hidden" name="total" value="{{\app\Models\Cart::total()}}">
        {{-- <input type="hidden" name="carts" value="{{$carts}}"> --}}
        <input type="hidden" name="delivery_id" value="{{$delivery_id ?? ''}}">
        {{-- @if(isset($delivery_id)) --}}
        <script src="https://checkout.stripe.com/checkout.js"
          class="stripe-button"
          data-key="{{env('STRIPE_KEY')}}"
          data-amount="{{\app\Models\Cart::total()}}"
          data-name="Red SuperMarket"
          data-label="支払う"
          data-description="クレジットカード情報の入力"
          data-image="{{asset('image/redsuper.jpg')}}"
          data-locale="auto"
          data-currency="JPY">
        </script>
        {{-- @endif --}}
      </form>
    </div>

    @else
    <p>カートの中に商品はありません。</p>
    @endif
        
  </div>
</div>