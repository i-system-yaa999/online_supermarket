{{-- layouts\contents\index\tab_content.blade.php にてinclude--}}
{{-- layouts\contents\mypage\tab3_like.blade.php にてinclude--}}

{{-- コンテンツ内容 --}}
<div class="item_data">
  {{-- イメージ & 詳細ページリンク --}}
  <form id="product{{$product->id}}">
    <input type="hidden" name="product_id" value="{{$product->id ?? ''}}">
    <input type="hidden" name="product_name" value="{{$product->name ?? ''}}">
    <input type="hidden" name="product_genre_id" value="{{$product->genre_id ?? ''}}">
    <input type="hidden" name="product_genre_name" value="{{$product->genre->name ?? '+++'}}">
    <input type="hidden" name="product_area_id" value="{{$product->area_id ?? ''}}">
    <input type="hidden" name="product_area_name" value="{{$product->area->name ?? '---'}}">
    <input type="hidden" name="product_price" value="{{$product->price ?? ''}}">
    <input type="hidden" name="product_description" value="{{$product->description ?? ''}}">
    <input type="hidden" name="product_image" value="{{$product->image->url ?? ''}}">
    <img class="item_image" src="{{asset($product->image->url)}}" alt="{{$product->name}}" onclick="showDetail({{$product->id}})" title="詳しく見る">
  </form>

  {{-- タグ --}}
  <div class="item_hashtag">
    {{-- 産地 --}}
    <input type="hidden" name="" id="area_id" value="{{$product->area_id ?? ''}}">
    <p><label class="item_area">#{{$product->area->name ?? '---'}}</label></p>
  </div>

  <div class="item_name_frame">
    {{-- 名称 --}}
    <h3 class="item_name">{{$product->name}}</h3>
    {{-- お気に入り --}}
    @include('layouts.like')
  </div>

  <div class="item_inner_frame">
    <div class="item_group">
      {{-- タグ --}}
      <div class="item_hashtag">
        {{-- 売り場 --}}
        <input type="hidden" name="" id="genre_id" value="{{$product->genre_id ?? ''}}">
        <p><label class="item_genre">#{{$product->genre->name ?? '---'}}</label></p>
      </div>
    </div>
    <div class="item_group">
      {{-- 価格 --}}
      <p><span class="item_price">{{$product->price}}</span><span>円（税込）</span></p>
      @auth
      <form action="{{route('cart.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id ?? ''}}">
        <input type="hidden" name="product_name" value="{{ $product->name ?? ''}}">
        <input type="hidden" name="product_price" value="{{ $product->price ?? ''}}">
        <input type="hidden" name="product_image" value="{{ $product->image->url ?? ''}}">
        {{-- 個数 --}}
        <select name="quantity" id="quantity" class="item_quantity selectbox">
          <option value="1">個数：1</option>
          @for($i = 1; $i <= 50; $i++) 
          <option value="{{$i}}">
            {{$i}}
          </option>
          @endfor
        </select>
        <button type="submit" class="btn item_submit">カートへ</button>
      </form>
      @endauth
    </div>
  </div>

</div>