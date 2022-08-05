{{-- xxx --}}
<div class="tab_content" id="tab4_content">
  <div class="content_nav">
    @if(isset($comments))
    <p>{{$comments->total()}}件の評価が見つかりました。</p>

    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $comments])

    @endif


  </div>
  {{-- コンテンツ --}}
  
  <div class="data_list">
  
    <table class="tbl_item_list">
      <thead class="tbl_head">
        <tr>
          <th class="list_center list_id">商品<br>ID</th>
          <th>画像</th>
          <th class="fixed_head">商品名</th>
          <th>価格<br>(税込)</th>
          <th class="no_wap">評価投稿者</th>
          <th>評価数</th>
          <th class="no_wap">評価コメント</th>
          <th>作成日<br>------<br>更新日</th>
          {{-- <th></th>
          <th></th> --}}
        </tr>
      </thead>
      <tbody>
        @foreach($products as $product)
          @foreach($product->comments as $comment)
          <tr class="@if($loop->iteration % 2) tbl_odd @else tbl_even @endif" id="tbl_item{{$product->id}}">
            <input type="hidden" name="tab_item" value="{{$tab_item}}">
            {{-- id --}}
            <td class="list_id">
              <input type="text" name="product_id" class="list_center list_id" value="{{$product->id}}">
            </td>
            {{-- イメージurl --}}
            <td class="list_image">
              <img src="{{$product->image->url}}" alt="">
            </td>
            {{-- 商品名 --}}
            <td class="list_name @if($loop->iteration % 2) fixed_odd @else fixed_even @endif">
              <p>{{$product->name}}</p>
            </td>
            {{-- 価格 --}}
            <td class="list_price">
              <p>{{$product->price}}</p>
            </td>
            {{-- 評価投稿者 --}}
            <td class="list_user_name">
              <p class="no_wap">{{$comment->user->name}}</p>
            </td>
            {{-- 評価数 --}}
            <td class="list_evaluation">
              <p class="my_evaluation">
                {{-- <label for="">{{$comment->evaluation ?? 0}}</label> --}}
                <button type="button" class="my_star @if(($comment->evaluation ?? '0') >= 1) star_on @endif"></button>
                <button type="button" class="my_star @if(($comment->evaluation ?? '0') >= 2) star_on @endif"></button>
                <button type="button" class="my_star @if(($comment->evaluation ?? '0') >= 3) star_on @endif"></button>
                <button type="button" class="my_star @if(($comment->evaluation ?? '0') >= 4) star_on @endif"></button>
                <button type="button" class="my_star @if(($comment->evaluation  ?? '0')  == 5) star_on @endif"></button>
              </p>
            </td>
            {{-- 評価コメント --}}
            <td class="list_comments">
              <p>{{$comment->comment ?? ''}}</p>
            </td>
            {{-- 作成日/更新日 --}}
            <td class="list_created">{{$comment->created_at}}<span class="hr"></span>{{$comment->updated_at}}</td>
          </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>
  
  </div>
</div>