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
          <td class="product_image"><img src="{{$cart->product->image->url}}" alt="Thumbnail"></td>
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

    <div class="charge">
      <form action="{{asset('/charge')}}" method="POST">
        @csrf
        <input type="hidden" name="total" value="{{\app\Models\Cart::total()}}">
        {{-- <input type="hidden" name="carts" value="{{$carts}}"> --}}
        <input type="hidden" name="delivery_id" value="{{$delivery->id ?? ''}}">
        @if(isset($delivery->id))
          
          <p>配達日：{{$delivery->date}}</p>
          <p>　</p>
          <p>配達便：{{$delivery->number}}便</p>
          <p>　</p>
          <p>配達時間：
            @if($delivery->number == 0) 店舗での受け取り 
            @elseif($delivery->number == 1) 10:00～12:00
            @elseif($delivery->number == 2) 12:00～14:00
            @elseif($delivery->number == 3) 14:00～16:00
            @elseif($delivery->number == 4) 16:00～18:00
            @elseif($delivery->number == 5) 18:00～20:00
            @endif
          </p>
          <p>　</p>

        <script src="https://checkout.stripe.com/checkout.js"
          class="stripe-button"
          data-key="{{env('STRIPE_KEY')}}"
          data-amount="{{\app\Models\Cart::total()}}"
          data-name="Red SuperMarket"
          data-label="支払う"
          data-description="クレジットカード情報の入力"
          data-image="{{asset('images/redsuper.jpg')}}"
          data-locale="auto"
          data-currency="JPY">
        </script>
        @else
        <h4>お支払いの前に配達日時を予約してください。</h4>
        @endif
      </form>
    </div>

    @else
    <p>カートの中に商品はありません。</p>
    @endif
        
  </div>
</div>