{{-- 商品の追加 --}}
<div class="tab_content" id="tab0_content">
  <div class="content_nav">
    @if(isset($products))
    <p>{{$products->total()}}件のデータが登録されています。</p>
    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $products])
    @endif
    {{-- 新規作成ボタン --}}
    <button class="btn btn_list_newitem">新規作成</button>
  </div>
  {{-- コンテンツ --}}
  <div class="data_list">

    <table class="tbl_item_list">
      <thead class="tbl_head">
        <tr>
          {{-- <th></th> --}}
          <th class="list_center list_id">ID</th>
          <th class="fixed_head">商品名</th>
          <th>価格<br>(税込)</th>
          <th>画像</th>
          <th>画像URL<br>image/products/</th>
          <th>売り場</th>
          <th>産地</th>
          <th>説明</th>
          <th>作成日<br>------<br>更新日</th>
          <th></th>
          <th></th>
          {{-- <th></th> --}}
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
        <tr class="@if($loop->iteration % 2) tbl_odd @else tbl_even @endif" id="tbl_item{{$product->id}}">
          {{-- チェックボックス --}}
          {{-- <td class="list_center list_checkbox">
            <input type="checkbox" name="" id="">
          </td> --}}
          {{-- id --}}
          <td class="list_center list_id" name="product_id{{$product->id}}" id="product_id{{$product->id}}">
            {{$product->id}}
          </td>
          {{-- 商品名 --}}
          <td class="list_name @if($loop->iteration % 2) fixed_odd @else fixed_even @endif">
            <input type="text" name="product_name{{$product->id}}" id="product_name{{$product->id}}" class="inputbox"
              value="{{$product->name}}">
            @if(($product->id==old('product_id')) && ($errors->has('product_name')))
            <div class="error_disp">{{$errors->first('product_name')}}</div>
            @endif
          </td>
          {{-- 価格 --}}
          <td class="list_price">
            <input type="number" name="product_price{{$product->id}}" id="product_price{{$product->id}}" class="inputbox" value="{{$product->price}}">
            @if(($product->id==old('product_id')) && ($errors->has('product_price')))
            <div class="error_disp">{{$errors->first('product_price')}}</div>
            @endif
          </td>
          {{-- イメージurl --}}
          <td class="list_image"><img src="{{$product->image->url}}" alt=""></td>
          <td class="list_image-url">
            <select name="product_image_url{{$product->id}}" id="product_image_url{{$product->id}}" class="selectbox">
              @foreach($allimages as $image)
              <option value="{{$image->url}}" @if($product->image->url == $image->url) selected @endif>
                {{$image->id}} : {{str_replace('image/products/', '', $image->url)}}
              </option>
              @endforeach
            </select>
            @if(($product->id==old('product_id')) && $errors->has('product_image_url'))
            <div class="error_disp">{{$errors->first('product_image')}}</div>
            @endif
          </td>
          {{-- 売り場 --}}
          <td class="list_genre-name">
            <select name="product_genre_id{{$product->id}}" id="product_genre_id{{$product->id}}" class="selectbox">
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
            <select name="product_area_id{{$product->id}}" id="product_area_id{{$product->id}}" class="selectbox">
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
            <input type="text" name="product_description{{$product->id}}" id="product_description{{$product->id}}"
              class="inputbox" value="{{$product->description}}">
            @if(($product->id==old('product_id')) && ($errors->has('product_description')))
            <div class="error_disp">{{$errors->first('product_description')}}</div>
            @endif
          </td>
          {{-- 作成日/更新日 --}}
          <td class="list_created">{{$product->created_at}}<span class="hr"></span>{{$product->updated_at}}</td>
          {{-- 登録ボタン --}}
          <td class="list_center list_modify">
            <form action="/manage" method="POST">
              @method('PUT')
              @csrf
              <input type="hidden" value="{{$product}}">
              <input type="hidden" value="{{$product->id}}">
              <input type="hidden" value="{{$product->name}}">
              <input type="hidden" value="{{$product->price}}">
              <input type="hidden" value="{{$product->image}}">
              <input type="hidden" value="{{$product->genre}}">
              <input type="hidden" value="{{$product->area}}">
              <input type="hidden" value="{{$product->description}}">
              <button class="btn btn-modify" type="submit">登録</button>
            </form>
          </td>
          {{-- 削除ボタン --}}
          <td class="list_center list_delete">
            <form action="/manage" method="POST">
              @method('DELETE')
              @csrf
              <input type="hidden" value="{{$product->id}}">
              <button class="btn btn-delete" type="submit">削除</button>
            </form>
          </td>
          {{-- 終端 --}}
          {{-- <td class="list_terminal"></td> --}}
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>