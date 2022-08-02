{{-- ユーザーの編集 --}}
<div class="tab_content" id="tab1_content">
  <div class="content_nav">
    @if(isset($users))
    <p>{{$users->total()}}名のユーザーが登録されています。</p>

    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $users])
    @endif
    {{-- 新規作成ボタン --}}
    <button type="button" class="btn btn_add_item" onclick="showUserWindow()">新規作成</button>
    <button type="button" class="btn btn_add_item" onclick="showEmailWindow()">メール送信</button>
  </div>
  {{-- コンテンツ --}}
  <div class="data_list">
  
    <table class="tbl_item_list">
      <thead class="tbl_head">
        <tr>
          <th class="list_center list_id">ID</th>
          <th>権限</th>
          <th class="fixed_head">ユーザー名</th>
          <th>メールアドレス</th>
          <th>パスワード</th>
          <th>作成日<br>------<br>更新日</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr class="@if($loop->iteration % 2) tbl_odd @else tbl_even @endif">
          <form action="/admin" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="tab_item" value="{{$tab_item}}">
            {{-- id --}}
            <td class="list_id">
              <input type="text" name="user_id" class="list_center list_id" value="{{$user->id}}" disabled>
            </td>
            {{-- 権限 --}}
            <td class="list_user_role">
              <input type="text" name="user_role" class="list_center list_id" value="{{$user->role}}" disabled>
              @if(($user->id==old('user_id')) && ($errors->has('user_role')))
              <div class="error_disp">{{$errors->first('user_role')}}</div>
              @endif
            </td>
            {{-- ユーザー名 --}}
            <td class="list_user_name @if($loop->iteration % 2) fixed_odd @else fixed_even @endif">
              <input type="text" name="user_name" class="inputbox" value="{{$user->name}}">
              @if(($user->id==old('user_id')) && ($errors->has('user_name')))
              <div class="error_disp">{{$errors->first('user_name')}}</div>
              @endif
            </td>
            {{-- メールアドレス --}}
            <td class="list_user_email">
              <input type="text" name="user_email" class="inputbox" value="{{$user->email}}">
              @if(($user->id==old('user_id')) && ($errors->has('user_email')))
              <div class="error_disp">{{$errors->first('user_email')}}</div>
              @endif
            </td>
            {{-- パスワード --}}
            <td class="list_user_password">
              <input type="text" name="user_password" class="inputbox" value="{{$user->password}}">
              @if(($user->id==old('user_id')) && ($errors->has('user_password')))
              <div class="error_disp">{{$errors->first('user_password')}}</div>
              @endif
            </td>
            {{-- 作成日/更新日 --}}
            <td class="list_created">{{$user->created_at}}<span class="hr"></span>{{$user->updated_at}}</td>
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
              <input type="hidden" name="tab_item" value="{{$tab_item}}">
              <input type="hidden" name="user_id" value="{{$user->id}}">
              <button class="btn btn-delete" type="submit">削除</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  
  </div>


  {{-- 新規作成用ウィンドウ --}}
  <div id="window_backframe" class="window_backframe @if(empty(old('new_user_open')) && empty(old('new_email_open'))) is-hidden @endif">
    <div class="window_background" onclick="hideWindow()"></div>
    <div class="window">
  
      {{-- ユーザー --}}
      @include('layouts.contents.new_user')

      {{-- メール送信 --}}
      @include('layouts.contents.new_email')
  
    </div>
  </div>
  
</div>