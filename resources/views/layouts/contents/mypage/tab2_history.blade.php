{{-- mypage.blade.php にてinclude --}}

{{-- 購入履歴 --}}
<div class="tab_content" id="tab2_content">
  <div class="my_content_nav">
    <h3>購入履歴</h3>
    @if(isset($histories) && count($histories) > 0)
    <p>前回購入した商品の内容になります。</p>
    @endif
  </div>
  {{-- コンテンツ --}}
  <div class="my_content_data">

    @if(isset($histories) && count($histories) > 0)
    <table class="history_list">
      <thead>
        <tr>
          <th class="">商品</th>
          <th class="">品名</th>
          <th class="">個数</th>
          <th class="">価格</th>
          <th class="">小計</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($histories as $history)
          @if($loop->first)
          <p>購入日時：{{$history->order->created_at}}</p>
          <p>　</p>
          <p>配達日：{{$history->order->delivery->date}}</p>
          <p>　</p>
          <p>配達便：{{$history->order->delivery->number}}便</p>
          <p>　</p>
          <p>配達時間：
            @if($history->order->delivery->number == 0) 店舗での受け取り
            @elseif($history->order->delivery->number == 1) 10:00～12:00
            @elseif($history->order->delivery->number == 2) 12:00～14:00
            @elseif($history->order->delivery->number == 3) 14:00～16:00
            @elseif($history->order->delivery->number == 4) 16:00～18:00
            @elseif($history->order->delivery->number == 5) 18:00～20:00
            @endif
          </p>
          @endif
        <tr>
          <td class="product_image"><img src="{{$history->product->image->url}}" alt="Thumbnail"></td>
          <td class="product_name">{{$history->product->name}}</td>
          <td class="history_qty">{{$history->quantity}}</td>
          {{-- 購入後に価格が変わる可能性があるので演算でpriceを求める --}}
          <td class="history_price">{{\app\Models\History::price($history->id)}}円</td>
          <td class="history_subtotal">{{$history->subtotal}}円</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
    <div class="total">
      <div class="total_price">お支払い合計： {{\app\Models\Order::total()}}円</div>
      <p>クレジットカードにて支払い済み</p>
    </div>

      @if($delivery_done)
      <div class="qr_frame">
        <p>店舗でお受け取り頂くことも可能です。</p>
        <p>店舗でのお受け取りの場合は、こちらのＱＲコードを提示してください。</p>
        <div class="qr">{!!$qrcode!!}</div>
      </div>
      @endif
    @else
    <p>購入履歴はありません。</p>
    @endif

  </div>
</div>