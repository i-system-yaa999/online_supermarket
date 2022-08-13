{{-- 売り場担当者の選択 --}}
<div class="tab_content" id="tab0_content">
  <div class="content_nav">
    @if(isset($managers))
    <p>{{$managers->total()}}名の売り場担当者が登録されています。</p>

    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $managers])
    @endif
    {{-- 新規作成ボタン --}}
    <button type="button" class="btn btn_add_item" onclick="showManagerWindow()">新規作成</button>
  </div>
  {{-- コンテンツ --}}
  <div class="data_list">
  
    <table class="tbl_item_list">
      <thead class="tbl_head">
        <tr>
          <th class="list_center list_id">ID</th>
          <th>権限</th>
          <th class="fixed_head">担当者名</th>
          <th>担当売り場</th>
          <th>作成日<br>------<br>更新日</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($managers as $manager)
        <tr class="@if($loop->iteration % 2) tbl_odd @else tbl_even @endif">
          <form action="/manager" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="tab_item" value="{{$tab_item}}">
            {{-- id --}}
            <td class="list_id">
              <input type="text" name="manager_id" class="list_center list_id" value="{{$manager->id}}" readonly>
            </td>
            {{-- 権限 --}}
            <td class="list_user_role">
              <input type="text" name="user_role" class="list_center list_id" value="{{$manager->user->role}}" readonly>
            </td>
            {{-- ユーザー名 --}}
            <td class="list_user_name @if($loop->iteration % 2) fixed_odd @else fixed_even @endif">
              <select name="user_id" class="selectbox">
                @foreach($allusers as $user)
                <option value="{{$user->id}}" @if($user->id == ($manager->user->id ?? '9999')) selected @endif>
                  {{$user->id.'：'.$user->name}}
                </option>
                @endforeach
              </select>
              @if(($manager->user->id==old('user_id')) && ($errors->has('user_id')))
              <div class="error_disp">{{$errors->first('user_id')}}</div>
              @endif
            </td>
            {{-- 担当売り場名 --}}
            <td class="list_genre_name">
              <select name="genre_id" class="selectbox">
                @foreach($allgenres as $genre)
                <option value="{{$genre->id}}" @if($genre->id == ($manager->genre->id ?? '9999')) selected @endif>
                  {{$genre->id.'：'.$genre->name}}
                </option>
                @endforeach
              </select>
              @if(($manager->genre->id==old('genre_id')) && ($errors->has('genre_id')))
              <div class="error_disp">{{$errors->first('genre_id')}}</div>
              @endif
            </td>
            {{-- 作成日/更新日 --}}
            <td class="list_created">{{$manager->created_at}}<span class="hr"></span>{{$manager->updated_at}}</td>
            {{-- 登録ボタン --}}
            <td class="list_center list_modify">
              <button class="btn btn-modify" type="submit">登録</button>
            </td>
          </form>
          {{-- 削除ボタン --}}
          <td class="list_center list_delete">
            <form action="/admin" method="POST">
              @method('DELETE')
              @csrf
              <input type="hidden" name="manager_id" value="{{$manager->id}}">
              <input type="hidden" name="user_id" value="{{$manager->user->id}}">
              <button class="btn btn-delete" type="submit">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  
  </div>
  
  
  {{-- 新規作成用ウィンドウ --}}
  <div id="window_backframe" class="window_backframe @if(empty(old('new_manager_open'))) is-hidden @endif">
    <div class="window_background" onclick="hideWindow()"></div>
    <div class="window">
  
      {{-- ユーザー --}}
      @include('layouts.contents.new_manager')
  
    </div>
  </div>

</div>