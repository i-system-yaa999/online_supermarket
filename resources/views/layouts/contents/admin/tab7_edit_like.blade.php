{{-- お気に入り登録の編集 --}}
<div class="tab_content" id="tab7_content">
  <div class="content_nav">
    @if(isset($likes))
    <p>{{$likes->total()}}件のデータが登録されています。</p>

    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $likes])
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
          <th>作成日<br>------<br>更新日</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($likes as $like)
        <tr class="@if($loop->iteration % 2) tbl_odd @else tbl_even @endif">
          <form action="/like" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="tab_item" value="{{$tab_item}}">
            {{-- id --}}
            <td class="list_id">
              <input type="text" name="like_id" class="list_center list_id" value="{{$like->id}}" readonly>
            </td>
            {{-- ユーザー名 --}}
            <td class="list_user_name @if($loop->iteration % 2) fixed_odd @else fixed_even @endif">
              <select name="user_id" class="selectbox">
                @foreach($allusers as $user)
                <option value="{{$user->id}}" @if(($like->user->id ?? '9999') == $user->id) selected @endif>
                  {{$user->id.'：'.$user->name}}
                </option>
                @endforeach
              </select>
            </td>
            {{-- イメージ --}}
            <td class="list_image">
              <img src="{{$like->product->image->url ?? ''}}" alt="">
            </td>
            {{-- 商品名 --}}
            <td class="list_product_name">
              <select name="product_id" id="" class="selectbox">
                <option value="" @if($like->product->id ?? 'selected') @endif>登録がありません</option>
                @foreach($allproducts as $product)
                <option value="{{$product->id}}" @if(($like->product->id ?? '9999') == $product->id) selected @endif>
                  {{$product->id.'：'.$product->name}}
                </option>
                @endforeach
              </select>
            </td>

            {{-- 作成日/更新日 --}}
            <td class="list_created">{{$like->created_at}}<span class="hr"></span>{{$like->updated_at}}</td>
            {{-- 登録ボタン --}}
            <td class="list_center list_modify">
              <button class="btn btn-modify" type="submit">登録</button>
            </td>
          </form>
          {{-- 削除ボタン --}}
          <td class="list_center list_delete">
            <form action="/like" method="POST">
              @method('DELETE')
              @csrf
              <input type="hidden" name="tab_item" value="{{$tab_item}}">
              <input type="hidden" name="like_id" value="{{$like->id}}">
              <button class="btn btn-delete" type="submit">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>

</div>