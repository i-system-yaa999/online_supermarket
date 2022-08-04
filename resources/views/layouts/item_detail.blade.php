{{-- layouts\contents\index\tab_content.blade.php にてinclude--}}
{{-- layouts\contents\mypage\tab3_like.blade.php にてinclude--}}

{{-- コンテンツ内容 --}}
<div class="detail_data">
  {{-- イメージ --}}
  <img id="image" class="detail_image" src="{{$product->image->url}}" alt="">
  <div class="detail_inner_frame">

    {{-- タグ --}}
    <div class="detail_hashtag">
      {{-- 産地 --}}
      <input type="hidden" name="" id="area_id">
      <label id="area_name" class="detail_area">#{{$product->area->name ?? '---'}}</label>
    </div>

    <div class="detail_name_frame">
      {{-- 名称 --}}
      <h3 id="name" class="detail_name">{{$product->name}}</h3>
      {{-- お気に入り --}}
      @include('layouts.like')
    </div>

    {{-- 詳細 --}}
    <p id="description" class="detail_discription">{{$product->discriptione}}</p>
    {{-- タグ --}}
    <p class="detail_hashtag">
      {{-- 売り場 --}}
      <input type="hidden" name="" id="genre_id">
      <label id="genre_name" class="detail_genre">#{{$product->genre->name ?? '---'}}</label>
    </p>
    {{-- 価格 --}}
    <span id="price" class="detail_price">{{$product->price}}</span><span>円（税込）</span>
    
    {{-- アクション --}}
    <div class="detail_action">
      {{-- カートへ --}}
      <form action="{{route('cart.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" id="id" value="{{$product->id}}">
        <input type="hidden" name="product_name" value="{{$product->name}}">
        <input type="hidden" name="product_price" value="{{$product->price}}">
        <input type="hidden" name="product_image" value="{{$product->image->url}}">
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

      
    </div>
  </div>
  {{-- 評価 --}}
  <section class="auxiliary">

    @if(isset($after_reservation))
    <div class="my_evaluation">
      <h3>前回、{{--$reserved_at--}}に購入しました。</h3>
      @if(empty($iscomment))
      <input type="hidden" id="my_star" name="evaluation" form="comment" value="0">
      <button id="my_star1" class="my_star" onclick="star_change(1,{{$shop->id}})"></button>
      <button id="my_star2" class="my_star" onclick="star_change(2,{{$shop->id}})"></button>
      <button id="my_star3}" class="my_star" onclick="star_change(3,{{$shop->id}})"></button>
      <button id="my_star4" class="my_star" onclick="star_change(4,{{$shop->id}})"></button>
      <button id="my_star5" class="my_star" onclick="star_change(5,{{$shop->id}})"></button>
      <textarea name="comment" id="" class="my_comment" cols="100" rows="10" form="comment"></textarea>
      <button type="submit" class="my_evaluation_send" form="comment" formaction="/comment/{{$shop->id}}">評価を投稿する</button>
      @else
      <p>評価コメント投稿済みです。</p>
      @endif
    </div>
    @endif

    <div class="evaluation">

      {{-- @if(count($comments)==0)
      <p>評価はまだありません。</p>
      @else
      <h3>評価（{{count($comments)}}件）</h3>
      <div class="evaluation_contents">
        @foreach($comments as $comment)
        <div class="evaluation_name">{{$comment->user->name}}</div>
        <div class="evaluation_inner">
          <img src="{{asset('images/star'.$comment->evaluation.'.jpg')}}" alt="" class="star">
          <div class="evaluation_date">投稿日：{{$comment->created_at}}</div>
        </div>
        <div class="evaluation_comment">{{$comment->comment}}</div>
        @endforeach
      </div>
      @endif --}}

    </div>
  </section>

</div>