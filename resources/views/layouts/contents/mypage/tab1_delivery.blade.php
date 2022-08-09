{{-- mypage.blade.php にてinclude --}}

{{-- 配達予約 --}}
<div class="tab_content" id="tab1_content">
  <div class="my_content_nav">
    <h3>配達予約</h3>
  </div>
  {{-- コンテンツ --}}
  <div class="my_content_data">
    @if(isset($carts))

    <div class="delivery">
      @if(isset($delivery))
      <h4>配達予約済み：第{{$delivery->number}}便</h4>
      <p>　</p>
      <p>以下の日時にて商品をお届けを予定しています。</p>
      <p>　</p>
      @else
      <h4>配達希望日と便を選択してください。</h4>
      <p>　</p>
      <p>店舗での受け取りは、</p>
      <p>営業時間内にてお受け取り頂けます。</p>
      <p>　</p>
      @endif
      <div class="delivery_time">
        <form action="/delivery" method="POST">
          @csrf
          <input type="hidden" name="tab_item" value="{{$tab_item}}">
          <input type="hidden" name="order_id" value="{{$order->id ?? ''}}">
          {{-- 配達日 --}}
          <select name="delivery_date" id="" class="selectbox">
            <option value="{{\Carbon\Carbon::tomorrow()}}" @if(\Carbon\Carbon::tomorrow()->format('Y年m月d日') == old('delivery_date')) selected @endif>
              明日：{{\Carbon\Carbon::tomorrow()->format('Y年m月d日')}}
            </option>
            <option value="{{\Carbon\Carbon::now()->addDay(2)}}" @if(\Carbon\Carbon::now()->addDay(2)->format('Y年m月d日') == old('delivery_date')) selected @endif>
              明後日：{{\Carbon\Carbon::now()->addDay(2)->format('Y年m月d日')}}
            </option>
          </select>
          {{-- 配達便 --}}
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

    @else
    <p>商品のお支払い前に配達日時を選択いただけます。</p>
    @endif
  </div>
</div>