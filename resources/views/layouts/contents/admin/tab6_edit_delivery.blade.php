{{-- 配達予約の編集 --}}
<div class="tab_content" id="tab6_content">
  <div class="content_nav">
    @if(isset($deliveries))
    <p>{{$deliveries->total()}}件のデータが登録されています。</p>

    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $deliveries])
    @endif
    {{-- 新規作成ボタン --}}
    {{-- <button type="button" class="btn btn_add_item" onclick="">新規作成</button> --}}
  </div>
  {{-- コンテンツ --}}
  <div class="data_list">

    <table class="tbl_item_list">
      <thead class="tbl_head">
        <tr>
          <th class="list_center list_id">ID</th>
          <th class="fixed_head">予約者名</th>
          <th>予約番号</th>
          <th>配送日</th>
          <th>配送時間</th>
          <th>作成日<br>------<br>更新日</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($deliveries as $delivery)
        <tr class="@if($loop->iteration % 2) tbl_odd @else tbl_even @endif">
          <form action="/delivery" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="tab_item" value="{{$tab_item}}">
            {{-- id --}}
            <td class="list_id">
              <input type="text" name="delivery_id" class="list_center list_id" value="{{$delivery->id}}" readonly>
            </td>
            {{-- 予約者名 --}}
            <td class="list_user_name @if($loop->iteration % 2) fixed_odd @else fixed_even @endif">
              <input type="hidden" name="delivery_user_id" class="inputbox" value="{{$delivery->order->user->id}}">
              <input type="text" name="delivery_user_name" class="inputbox" value="{{$delivery->order->user->name}}" readonly>
            </td>
            {{-- 予約番号 --}}
            <td class="list_order_munber">
              <input type="hidden" name="delivery_order_id" class="inputbox" value="{{$delivery->order->id}}">
              <input type="text" name="delivery_order_number" class="inputbox" value="{{$delivery->order->number}}" readonly>
            </td>
            {{-- 配送日 --}}
            <td class="list_delivery_day">
              <input type="date" name="delivery_date" class="inputbox" value="{{$delivery->date}}">
              @if(($delivery->id==old('delivery_id')) && ($errors->has('delivery_date')))
              <div class="error_disp">{{$errors->first('delivery_date')}}</div>
              @endif
            </td>
            {{-- 配送時間 --}}
            <td class="list_delivery_number">
              {{-- <input type="number" name="list_delivery_number" class="inputbox" value="{{$delivery->number}}"> --}}
              <select name="delivery_number" id="" class="selectbox">
                <option value="0" @if($delivery->number==0) selected @endif>店舗で受け取る</option>
                <option value="1" @if($delivery->number==1) selected @endif>第1便：10:00 ～ 12:00</option>
                <option value="2" @if($delivery->number==2) selected @endif>第2便：12:00 ～ 14:00</option>
                <option value="3" @if($delivery->number==3) selected @endif>第3便：14:00 ～ 16:00</option>
                <option value="4" @if($delivery->number==4) selected @endif>第4便：16:00 ～ 18:00</option>
                <option value="5" @if($delivery->number==5) selected @endif>第5便：18:00 ～ 20:00</option>
              </select>
            </td>

            {{-- 作成日/更新日 --}}
            <td class="list_created">{{$delivery->created_at}}<span class="hr"></span>{{$delivery->updated_at}}</td>
            {{-- 登録ボタン --}}
            <td class="list_center list_modify">
              <button class="btn btn-modify" type="submit">登録</button>
            </td>
          </form>
          {{-- 削除ボタン --}}
          <td class="list_center list_delete">
            <form action="/delivery" method="POST">
              @method('DELETE')
              @csrf
              <input type="hidden" name="tab_item" value="{{$tab_item}}">
              <input type="hidden" name="delivery_id" value="{{$delivery->id}}">
              <button class="btn btn-delete" type="submit">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>

  {{-- 新規作成用ウィンドウ --}}
  <div id="window_backframe"
    class="window_backframe @if(empty(old('new_delivery_open'))) is-hidden @endif">
    <div class="window_background" onclick="hideWindow()"></div>
    <div class="window">

      @include('layouts.contents.new_area')

    </div>
  </div>


</div>