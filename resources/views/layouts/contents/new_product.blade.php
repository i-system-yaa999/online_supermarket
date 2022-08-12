{{-- 商品 --}}
<div id="new_product" class="new_data new_product_window @if(empty(old('new_product_open'))) product_hide @endif">
  <div class="new_product_title">
    <h4>商品の新規作成</h4>
    <hr>
    <h5>各項目を記入して、新規登録ボタンを押してください。</h5>
  </div>

  <form action="/product" method="POST">
    @csrf
    <table class="new_data_table">

      {{-- 商品名 --}}
      <tr class="">
        <th class="new_name_head new_head">商品名</th>
        <td class="new_name_data new_odd">
          <input type="text" name="product_name" class="new_name" value="{{old('product_name')}}">
          @if($errors->has('product_name'))
          <div class="error_disp">{{$errors->first('product_name')}}</div>
          @endif
        </td>
      </tr>

      {{-- 価格 --}}
      <tr class="">
        <th class="new_price_head new_head">価格(税込)</th>
        <td class="new_price_data new_even">
          <input type="number" name="product_price" class="new_price" value="{{old('product_price')}}">円
          @if($errors->has('product_price'))
          <div class="error_disp">{{$errors->first('product_price')}}</div>
          @endif
        </td>
      </tr>

      {{-- 画像 --}}
      <tr class="">
        <th class="new_image_head new_head">画像URL</th>
        <td class="new_image_data new_odd">
          <select name="product_image_id" id="image_id" class="new_image">
            <option value="">画像を選択してください</option>
            @foreach($allimages as $image)
            <option value="{{$image->id}}" @if(old('product_image_id',$product_image_id ?? '' )==$image->id) selected
              @endif>
              {{$image->id.'：'.$image->url}}
            </option>
            @endforeach
          </select>
          @if($errors->has('product_image_id'))
          <div class="error_disp">{{$errors->first('product_image_id')}}</div>
          @endif
        </td>
      </tr>
      
      {{-- 売り場 --}}
      <tr class="">
        <th class="new_genre_head new_head">売り場</th>
        <td class="new_genre_data new_even">
          <select name="product_genre_id" class="new_genre">
            <option value="">売り場を選択してください</option>
            @foreach($allgenres as $genre)
            <option value="{{$genre->id}}" @if(old('product_genre_id',$product_genre_id ?? '' )==$genre->id) selected
              @endif>
              {{$genre->id.'：'.$genre->name}}
            </option>
            @endforeach
          </select>
          @if($errors->has('product_genre_id'))
          <div class="error_disp">{{$errors->first('product_genre_id')}}</div>
          @endif
        </td>
      </tr>

      {{-- 産地 --}}
      <tr class="">
        <th class="new_area_head new_head">産地</th>
        <td class="new_area_data new_odd">
          <select name="product_area_id" class="new_area">
            <option value="">産地を選択してください</option>
            @foreach($allareas as $area)
            <option value="{{$area->id}}" @if(old('product_area_id',$product_area_id ?? '' )==$area->id) selected
              @endif>
              {{$area->id.'：'.$area->name}}
            </option>
            @endforeach
          </select>
          @if($errors->has('product_area_id'))
          <div class="error_disp">{{$errors->first('product_area_id')}}</div>
          @endif
        </td>
      </tr>

      {{-- 説明 --}}
      <tr class="">
        <th class="new_description_head new_head">説明</th>
        <td class="new_description_data new_even">
          <textarea name="product_description" class="new_description">{{old('product_description')}}</textarea>
          @if($errors->has('product_description'))
          <div class="error_disp">{{$errors->first('product_description')}}</div>
          @endif
        </td>
      </tr>
    </table>

    {{-- ウィンドウフラグ --}}
    <input type="hidden" name="new_product_open" value="true">
    {{-- 送信ボタン --}}
    <div class="new_create">
      <button type="submit" class="btn btn_create">新規登録</button>
    </div>

  </form>
</div>