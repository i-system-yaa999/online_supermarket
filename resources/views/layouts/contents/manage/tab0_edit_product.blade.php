{{-- 商品の編集 --}}
<div class="tab_content" id="tab0_content">
  <div class="content_nav">
    @if(isset($products))
    <p>{{$products->total()}}件のデータが登録されています。</p>
    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $products])
    @endif
  </div>
  {{-- コンテンツ --}}
  <div class="data_list">

    <table class="tbl_item_list">
      <thead class="tbl_head">
        <tr>
          <th class="list_center list_id">ID</th>
          <th class="fixed_head">商品名</th>
          <th>価格<br>(税込)</th>
          <th>画像</th>
          <th>画像URL<br>images/products/</th>
          <th>売り場</th>
          <th>産地</th>
          <th>説明</th>
          <th>作成日<br>------<br>更新日</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr class="@if($loop->iteration % 2) tbl_odd @else tbl_even @endif" id="tbl_item{{$product->id}}">
          <form action="/product" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="tab_item"value="{{$tab_item}}">
            {{-- id --}}
            <td class="list_id">
              <input type="text" name="product_id" class="list_center list_id" value="{{$product->id}}">
            </td>
            {{-- 商品名 --}}
            <td class="list_name @if($loop->iteration % 2) fixed_odd @else fixed_even @endif">
              <input type="text" name="product_name" class="inputbox" value="{{$product->name}}">
              @if(($product->id==old('product_id')) && ($errors->has('product_name')))
              <div class="error_disp">{{$errors->first('product_name')}}</div>
              @endif
            </td>
            {{-- 価格 --}}
            <td class="list_price">
              <input type="number" name="product_price" class="inputbox" value="{{$product->price}}">
              @if(($product->id==old('product_id')) && ($errors->has('product_price')))
              <div class="error_disp">{{$errors->first('product_price')}}</div>
              @endif
            </td>
            {{-- イメージurl --}}
            <td class="list_image">
              <img src="{{$product->image->url}}" alt="">
            </td>
            <td class="list_image-url">
              <select name="product_image_id" class="selectbox">
                @foreach($allimages as $image)
                <option value="{{$image->id}}" @if($product->image->url == $image->url) selected @endif>
                  {{$image->id}} : {{str_replace('images/products/', '', $image->url)}}
                </option>
                @endforeach
              </select>
              @if(($product->id==old('product_id')) && $errors->has('product_image_url'))
              <div class="error_disp">{{$errors->first('product_image')}}</div>
              @endif
            </td>
            {{-- 売り場 --}}
            <td class="list_genre-name">
              <select name="product_genre_id" class="selectbox">
                <option value="{{($product->genre->id ?? '9999')}}">
                  {{($product->genre->id ?? '9999').'：'.($product->genre->name ?? '未登録')}}
                </option>
                @foreach($allgenres as $genre)
                <option value="{{$genre->id}}" @if(($product->genre->id ?? '9999') == $genre->id) selected @endif>
                  {{$genre->id.'：'.$genre->name}}
                </option>
                @endforeach
              </select>
              @if(($product->id==old('product_id')) && ($errors->has('product_genre_id')))
              <div class="error_disp">{{$errors->first('product_genre_id')}}</div>
              @endif
            </td>
            {{-- 産地 --}}
            <td class="list_area-name">
              <select name="product_area_id" class="selectbox">
                <option value="{{($product->area->id ?? '9999')}}">
                  {{($product->area->id ?? '9999').'：'.($product->area->name ?? '未登録')}}
                </option>
                @foreach($allareas as $area)
                <option value="{{$area->id}}" @if(($product->area->id ?? '9999') == $area->id) selected @endif>
                  {{$area->id.'：'.$area->name}}
                </option>
                @endforeach
              </select>
              @if(($product->id==old('product_id')) && ($errors->has('product_area_id')))
              <div class="error_disp">{{$errors->first('product_area_id')}}</div>
              @endif
            </td>
            {{-- 説明 --}}
            <td class="list_description">
              <input type="text" name="product_description" class="inputbox" value="{{$product->description}}">
              @if(($product->id==old('product_id')) && ($errors->has('product_description')))
              <div class="error_disp">{{$errors->first('product_description')}}</div>
              @endif
            </td>
            {{-- 作成日/更新日 --}}
            <td class="list_created">{{$product->created_at}}<span class="hr"></span>{{$product->updated_at}}</td>
            {{-- 登録ボタン --}}
            <td class="list_center list_modify">
              <button class="btn btn-modify" type="submit">登録</button>
            </td>
          </form>
          {{-- 削除ボタン --}}
          <td class="list_center list_delete">
            <form action="/product" method="POST">
              @method('DELETE')
              @csrf
              <input type="hidden" name="tab_item" value="{{$tab_item}}">
              <input type="hidden" name="product_id" value="{{$product->id}}">
              <button class="btn btn-delete" type="submit">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>