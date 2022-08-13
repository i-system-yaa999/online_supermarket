{{-- 画像の編集 --}}
<div class="tab_content" id="tab3_content">
  <div class="content_nav">
    @if(isset($images))
    <p>{{$images->total()}}件のデータが登録されています。</p>

    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $images])
    @endif
    {{-- 新規作成ボタン --}}
    <button type="button" class="btn btn_add_item" onclick="showImageWindow()">新規作成</button>
  </div>
  {{-- コンテンツ --}}
  <div class="data_list">
  
    <table class="tbl_item_list">
      <thead>
        <tr class="tbl_head">
          <th class="list_center list_id">ID</th>
          <th class="fixed_head">画像</th>
          <th>画像URL</th>
          <th>作成日<br>------<br>更新日</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($images as $image)
        <tr class="@if($loop->iteration % 2) tbl_odd @else tbl_even @endif">
          <form action="/img" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="tab_item" value="{{$tab_item}}">
            {{-- id --}}
            <td class="list_id">
              <input type="text" name="image_id" class="list_center list_id" value="{{$image->id}}" readonly>
            </td>
            {{-- イメージurl --}}
            <td class="list_image @if($loop->iteration % 2) fixed_odd @else fixed_even @endif">
              <img src="{{asset($image->url)}}" alt="">
            </td>
            <td class="list_imageURL">
              <input type="text" name="image_url" class="inputbox" value="{{$image->url}}">
              @if(($image->id==old('image_id')) && ($errors->has('image_url')))
              <div class="error_disp">{{$errors->first('image_url')}}</div>
              @endif
            </td>
            {{-- 作成日/更新日 --}}
            <td class="list_created">{{$image->created_at}}<span class="hr"></span>{{$image->updated_at}}</td>
            {{-- 登録ボタン --}}
            <td class="list_center list_modify">
              <button class="btn btn-modify" type="submit">登録</button>
            </td>
          </form>
          {{-- 削除ボタン --}}
          <td class="list_center list_delete">
            <form action="/img" method="POST">
              @method('DELETE')
              @csrf
              <input type="hidden" name="tab_item" value="{{$tab_item}}">
              <input type="hidden" name="image_id" value="{{$image->id}}">
              <button class="btn btn-delete" type="submit">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  
  </div>
  
  {{-- 新規作成用ウィンドウ --}}
  <div id="window_backframe" class="window_backframe @if(empty(old('new_image_open')) && empty(old('new_genre_open')) && empty(old('new_area_open'))) is-hidden @endif">
    <div class="window_background" onclick="hideWindow()"></div>
    <div class="window">
  
      @include('layouts.contents.new_image')
  
    </div>
  </div>
  
  
</div>