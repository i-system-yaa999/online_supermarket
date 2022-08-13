{{-- 売り場の編集 --}}
<div class="tab_content" id="tab4_content">
  <div class="content_nav">
    @if(isset($genres))
    <p>{{$genres->total()}}件のデータが登録されています。</p>

    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $genres])
    @endif
    {{-- 新規作成ボタン --}}
    <button type="button" class="btn btn_add_item" onclick="showGenreWindow()">新規作成</button>

  </div>
  {{-- コンテンツ --}}
  <div class="data_list">
  
    <table class="tbl_item_list">
      <thead class="tbl_head">
        <tr>
          <th class="list_center list_id">ID</th>
          <th class="fixed_head">売り場名</th>
          <th>作成日<br>------<br>更新日</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($genres as $genre)
        <tr class="@if($loop->iteration % 2) tbl_odd @else tbl_even @endif">
          <form action="/genre" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="tab_item" value="{{$tab_item}}">
            {{-- id --}}
            <td class="list_id">
              <input type="text" name="genre_id" class="list_center list_id" value="{{$genre->id}}" readonly>
            </td>
            {{-- 売り場名 --}}
            <td class="list_name @if($loop->iteration % 2) fixed_odd @else fixed_even @endif">
              <input type="text" name="genre_name" class="inputbox" value="{{$genre->name}}">
              @if(($genre->id==old('genre_id')) && ($errors->has('genre_name')))
              <div class="error_disp">{{$errors->first('genre_name')}}</div>
              @endif
            </td>
            {{-- 作成日/更新日 --}}
            <td class="list_created">{{$genre->created_at}}<span class="hr"></span>{{$genre->updated_at}}</td>
            {{-- 登録ボタン --}}
            <td class="list_center list_modify">
              <button class="btn btn-modify" type="submit">登録</button>
            </td>
          </form>
          {{-- 削除ボタン --}}
          <td class="list_center list_delete">
            <form action="/genre" method="POST">
              @method('DELETE')
              @csrf
              <input type="hidden" name="tab_item" value="{{$tab_item}}">
              <input type="hidden" name="genre_id" value="{{$genre->id}}">
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
  
      @include('layouts.contents.new_genre')
  
    </div>
  </div>
  
  
</div>