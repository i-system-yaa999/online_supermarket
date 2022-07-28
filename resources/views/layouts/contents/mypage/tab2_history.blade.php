{{-- mypage.blade.php にてinclude --}}

{{-- 購入履歴 --}}
<div class="tab_content" id="tab2_content">
  <div class="my_content_nav">
    <h3>購入履歴</h3>
    <p>前回購入した商品の内容になります。</p>
  </div>
  <div class="qr">
    {{-- <div class="qr">{!!$qrcode!!}</div> --}}
    <p>商品配達の際に配達員にＱＲを提示してください。</p>
  </div>
  {{-- コンテンツ --}}
  <div class="my_content_data">

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
        <tr>
          <td class="product_image"><img src="{{$history->product->image}}" alt="Thumbnail"></td>
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
      <div class="total_price">お支払い合計： {{\app\Models\History::total()}}円</div>
    </div>
    
  </div>
</div>