{{-- xxx --}}
<div class="tab_content" id="tab2_content">
  <div class="content_nav">
    @if(isset($areas))
    <p>{{$areas->total()}}件のデータが登録されています。</p>
    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $areas])
    @endif
    {{-- 新規作成ボタン --}}
    <button type="button" class="btn btn_add_item" onclick="showAreaWindow()">新規作成</button>
  </div>
  {{-- コンテンツ --}}
  <div class="data_list">

    <table class="tbl_item_list">
      <thead class="tbl_head">
        <tr>
          <th class="list_center list_id">ID</th>
          <th class="fixed_head">産地名</th>
          <th>作成日<br>------<br>更新日</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($areas as $area)
        <tr class="@if($loop->iteration % 2) tbl_odd @else tbl_even @endif">
          <form action="/area" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="tab_item" value="{{$tab_item}}">
            {{-- id --}}
            <td class="list_id">
              <input type="text" name="area_id" class="list_center list_id" value="{{$area->id}}" readonly>
            </td>
            {{-- 産地名 --}}
            <td class="list_name @if($loop->iteration % 2) fixed_odd @else fixed_even @endif">
              <input type="text" name="area_name" class="inputbox" value="{{$area->name}}">
              @if(($area->id==old('area_id')) && ($errors->has('area_name')))
              <div class="error_disp">{{$errors->first('area_name')}}</div>
              @endif
            </td>
            {{-- 作成日/更新日 --}}
            <td class="list_created">{{$area->created_at}}<span class="hr"></span>{{$area->updated_at}}</td>
            {{-- 登録ボタン --}}
            <td class="list_center list_modify">
              <button class="btn btn-modify" type="submit">登録</button>
            </td>
          </form>
          {{-- 削除ボタン --}}
          <td class="list_center list_delete">
            <form action="/area" method="POST">
              @method('DELETE')
              @csrf
              <input type="hidden" name="tab_item" value="{{$tab_item}}">
              <input type="hidden" name="area_id" value="{{$area->id}}">
              <button class="btn btn-delete" type="submit">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>

  {{-- 新規作成用ウィンドウ --}}
  <div id="window_backframe"
    class="window_backframe @if(empty(old('new_image_open')) && empty(old('new_genre_open')) && empty(old('new_area_open'))) is-hidden @endif">
    <div class="window_background" onclick="hideWindow()"></div>
    <div class="window">
      
      @include('layouts.contents.new_area')
  
    </div>
  </div>
</div>
<script>
  // function showAreaWindow(){
  //   document.getElementById('window_backframe').classList.remove('is-hidden');
  //   document.getElementById('new_area').classList.remove('area_hide');
  // }
  // function hideWindow(){
  //   document.getElementById('window_backframe').classList.add('is-hidden');
  //   document.getElementById('new_area').classList.add('area_hide');
  // }
</script>