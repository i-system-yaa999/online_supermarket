{{-- mypage.blade.php にてinclude --}}

{{-- 配達予約 --}}
<div class="tab_content" id="tab1_content">
  <div class="my_content_nav">
    <h3>配達予定</h3>
    <p>以下の日時にて商品をお届けを予定しています。</p>
  </div>
  {{-- コンテンツ --}}
  <div class="my_content_data">
    @if(count($carts) > 0)
    <div class="delivery">
      @if(isset($delivery))
      <p>配達予約済み：第{{$delivery->delivery_number}}便</p>
      @else
      <p>配達希望時間を選択してください。</p>
      @endif
      <div class="delivery_time">
        <form action="/delivery" method="POST">
          @csrf
          <input type="hidden" name="tab_item" value="{{$tab_item}}">
          <ul class="">
            <li class="delivery_item"><input type="radio" name="delivery_number" id="" value="0" @if(($delivery_number ?? 0)==0) checked @endif>店舗で受け取る</li>
            <li class="delivery_item"><input type="radio" name="delivery_number" id="" value="1" @if(($delivery_number ?? 0)==1) checked @endif>第1便：10:00 ～ 12:00</li>
            <li class="delivery_item"><input type="radio" name="delivery_number" id="" value="2" @if(($delivery_number ?? 0)==2) checked @endif>第2便：12:00 ～ 14:00</li>
            <li class="delivery_item"><input type="radio" name="delivery_number" id="" value="3" @if(($delivery_number ?? 0)==3) checked @endif>第3便：14:00 ～ 16:00</li>
            <li class="delivery_item"><input type="radio" name="delivery_number" id="" value="4" @if(($delivery_number ?? 0)==4) checked @endif>第4便：16:00 ～ 18:00</li>
            <li class="delivery_item"><input type="radio" name="delivery_number" id="" value="5" @if(($delivery_number ?? 0)==5) checked @endif>第5便：18:00 ～ 20:00</li>
          </ul>
          <button type="submit" class="btn btn_delivery">@if(isset($delivery)) 配達便を変更する @else 配達便を決定する @endif</button>
        </form>
      </div>
    </div>
    @else
    <p>カートの中に商品がないので配達予約はできません。</p>
    @endif
  </div>
</div>