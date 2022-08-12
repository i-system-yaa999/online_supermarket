{{-- 評価コメントの編集 --}}
<div class="tab_content" id="tab8_content">
  <div class="content_nav">
    @if(isset($comments))
    <p>{{$comments->total()}}件のデータが登録されています。</p>

    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $comments])
    @endif
  </div>
  {{-- コンテンツ --}}
  <div class="data_list">

    <table class="tbl_item_list">
      <thead class="tbl_head">
        <tr>
          <th class="list_center list_id">ID</th>
          <th class="fixed_head">ユーザー名</th>
          <th>画像</th>
          <th>商品名</th>
          <th>評価数</th>
          <th>コメント</th>
          <th>作成日<br>------<br>更新日</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($comments as $comment)
        <tr class="@if($loop->iteration % 2) tbl_odd @else tbl_even @endif">
          <form action="/comment" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="tab_item" value="{{$tab_item}}">
            {{-- id --}}
            <td class="list_id">
              <input type="text" name="comment_id" class="list_center list_id" value="{{$comment->id}}" readonly>
            </td>
            {{-- ユーザー名 --}}
            <td class="list_user_name @if($loop->iteration % 2) fixed_odd @else fixed_even @endif">
              <input type="text" name="comment_user_name" class="inputbox" value="{{$comment->user->name}}" readonly>
            </td>
            {{-- イメージ --}}
            <td class="list_image">
              <img src="{{$comment->product->image->url ?? ''}}" alt="">
            </td>
            {{-- 商品名 --}}
            <td class="list_name">
              <input type="text" name="comment_product_name" class="inputbox" value="{{$comment->product->name ?? '登録がありません'}}">
            </td>
            {{-- 評価数 --}}
            <td class="item-center list-evaluation">
              <p class="my_evaluation">
                <input type="hidden" name="comment_evaluation" id="my_star" value="{{$comment->evaluation}}" oninput="unregisteredComment()">
                <button id="my_star1{{$comment->id}}" class="my_star @if($comment->evaluation >= 1) star_on @endif" onclick="star_change(1,{{$comment->id}})"></button>
                <button id="my_star2{{$comment->id}}" class="my_star @if($comment->evaluation >= 2) star_on @endif" onclick="star_change(2,{{$comment->id}})"></button>
                <button id="my_star3{{$comment->id}}" class="my_star @if($comment->evaluation >= 3) star_on @endif" onclick="star_change(3,{{$comment->id}})"></button>
                <button id="my_star4{{$comment->id}}" class="my_star @if($comment->evaluation >= 4) star_on @endif" onclick="star_change(4,{{$comment->id}})"></button>
                <button id="my_star5{{$comment->id}}" class="my_star @if($comment->evaluation == 5) star_on @endif" onclick="star_change(5,{{$comment->id}})"></button>
              </p>           
            </td>
            {{-- コメント --}}
            <td>
              <input type="text" name="comment_comment" class="inputbox" value="{{$comment->comment}}">
              @if(($comment->id==old('comment_id')) && ($errors->has('comment_comment')))
              <div class="error_disp">{{$errors->first('comment_comment')}}</div>
              @endif
            </td>            
            {{-- 作成日/更新日 --}}
            <td class="list_created">{{$comment->created_at}}<span class="hr"></span>{{$comment->updated_at}}</td>
            {{-- 登録ボタン --}}
            <td class="list_center list_modify">
              <button class="btn btn-modify" type="submit">登録</button>
            </td>
          </form>
          {{-- 削除ボタン --}}
          <td class="list_center list_delete">
            <form action="/comment" method="POST">
              @method('DELETE')
              @csrf
              <input type="hidden" name="tab_item" value="{{$tab_item}}">
              <input type="hidden" name="comment_id" value="{{$comment->id}}">
              <button class="btn btn-delete" type="submit">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>

</div>