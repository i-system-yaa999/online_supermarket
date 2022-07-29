{{-- xxx --}}
<div class="tab_content" id="tab3_content">
  <div class="content_nav">
    @if(isset($images))
    <p>{{$images->total()}}件のデータが登録されています。</p>
    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $images])
    @endif
    {{-- 新規作成ボタン --}}
    <button class="btn btn_list_newitem">新規作成</button>
  </div>
  {{-- コンテンツ --}}
  <div class="data_list">

    <table class="tbl_item_list">
      <thead>
        <tr class="tbl_head">
          {{-- <th></th> --}}
          <th class="list_center list_id">ID</th>
          <th class="fixed_head">画像</th>
          <th>画像URL<br>image/products/</th>
          <th></th>
          <th>作成日<br>------<br>更新日</th>
          <th></th>
          <th></th>
          {{-- <th></th> --}}
        </tr>
      </thead>
      <tbody>
        @foreach($images as $image)
        <tr class="@if($loop->iteration % 2) tbl_odd @else tbl_even @endif" id="tbl-item{{$image->id}}">
          {{-- チェックボックス --}}
          {{-- <td class="list_center list_checkbox">
            <input type="checkbox" name="" id="">
          </td> --}}
          {{-- id --}}
          <td class="list_center list_id" name="image_id{{$image->id}}" id="image_id{{$image->id}}">
            {{$image->id}}
          </td>
          {{-- イメージurl --}}
          <td class="list_image @if($loop->iteration % 2) fixed_odd @else fixed_even @endif">
            <img src="{{$image->url}}" alt="">
          </td>
          <td class="list_imageURL">
            <input type="text" name="image_url{{$image->url}}" id="image_url{{$image->id}}" class="inputbox" value="{{str_replace('image/products/', '', $image->url)}}">
            @if(($image->id==old('image_id')) && ($errors->has('image_url')))
            <div class="error_disp">{{$errors->first('image_url')}}</div>
            @endif
          </td>
          {{-- 変更ボタン --}}
          <td class="list_center list_upload">
            <button class="btn btn-upload">画像変更</button>
          </td>
          {{-- 作成日/更新日 --}}
          <td class="list_created">{{$image->created_at}}<span class="hr"></span>{{$image->updated_at}}</td>
          {{-- 登録ボタン --}}
          <td class="list_center list_modify">
            <form action="/manage" method="POST">
              @method('PUT')
              @csrf
              <input type="hidden" value="{{$image}}">
              <input type="hidden" value="{{$image->id}}">
              <input type="hidden" value="{{$image->url}}">
              <button class="btn btn-modify" type="submit">登録</button>
            </form>
          </td>
          {{-- 削除ボタン --}}
          <td class="list_center list_delete">
            <form action="/manage" method="POST">
              @method('DELETE')
              @csrf
              <input type="hidden" value="{{$image->id}}">
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