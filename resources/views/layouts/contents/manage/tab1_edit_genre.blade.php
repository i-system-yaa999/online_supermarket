{{-- xxx --}}
<div class="tab_content" id="tab1_content">
  <div class="content_nav">
    @if(isset($genres))
    <p>{{$genres->total()}}件のデータが登録されています。</p>
    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $genres])
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
          <th class="fixed_head">売り場名</th>
          <th>作成日<br>------<br>更新日</th>
          <th></th>
          <th></th>
          {{-- <th></th> --}}
        </tr>
      </thead>
      <tbody>
        @foreach($genres as $genre)
        <tr class="@if($loop->iteration % 2) tbl_odd @else tbl_even @endif" id="tbl-item{{$genre->id}}">
          {{-- チェックボックス --}}
          {{-- <td class="list_center list_checkbox">
            <input type="checkbox" name="" id="">
          </td> --}}
          {{-- id --}}
          <td class="list_center list_id" name="genre_id{{$genre->id}}" id="genre_id{{$genre->id}}">
            {{$genre->id}}
          </td>
          {{-- 売り場名 --}}
          <td class="list_name @if($loop->iteration % 2) fixed_odd @else fixed_even @endif">
            <input type="text" name="genre_name{{$genre->id}}" id="genre_name{{$genre->id}}" class="inputbox" value="{{$genre->name}}">
            @if(($genre->id==old('genre_id')) && ($errors->has('genre_name')))
            <div class="error_disp">{{$errors->first('genre_name')}}</div>
            @endif
          </td>
          {{-- 作成日/更新日 --}}
          <td class="list_created">{{$genre->created_at}}<span class="hr"></span>{{$genre->updated_at}}</td>
          {{-- 登録ボタン --}}
          <td class="list_center list_modify">
            <form action="/manage" method="POST">
              @method('PUT')
              @csrf
              <input type="hidden" value="{{$genre}}">
              <input type="hidden" value="{{$genre->id}}">
              <input type="hidden" value="{{$genre->name}}">
              <button class="btn btn-modify" type="submit">登録</button>
            </form>
          </td>
          {{-- 削除ボタン --}}
          <td class="list_center list_delete">
            <form action="/manage" method="POST">
              @method('DELETE')
              @csrf
              <input type="hidden" value="{{$genre->id}}">
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