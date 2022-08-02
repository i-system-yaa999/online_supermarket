{{-- 売り場担当者 --}}
<div id="new_manager" class="new_manager_window @if(empty(old('new_manager_open'))) manager_hide @endif">
  <div class="new_manager_title">
    <h4>売り場担当者の新規登録</h4>
    <hr>
    <h5>担当者名と売り場を選択してください</h5>
  </div>
  <form class="new_manager_form" method="POST" action="/manager">
    @csrf

    {{-- 担当者名 --}}
    <div class="msg_window_name">
      <select name="manage_user_id" class="selectbox">
        <option value="" selected>登録したい担当者名を選択してください</option>
        @foreach($allusers as $user)
        <option value="{{$user->id}}">
          {{$user->id.'：'.$user->name}}
        </option>
        @endforeach
      </select>
      @if($errors->has('manage_user_id'))
      <div class="error_disp">{{$errors->first('manage_user_id')}}</div>
      @endif
    </div>

    {{-- 売り場 --}}
    <select name="manage_genre_name" class="selectbox">
      <option value="" selected>担当売り場名を選択してください</option>
      @foreach($allgenres as $genre)
      <option value="{{$genre->id}}">
        {{$genre->id.'：'.$genre->name}}
      </option>
      @endforeach
    </select>
    @if($errors->has('manage_genre_name'))
    <div class="error_disp">{{$errors->first('manage_genre_name')}}</div>
    @endif

    {{-- ウィンドウフラグ --}}
    <input type="hidden" name="new_manager_open" value="true">
    {{-- <input type="hidden" name="new_email_open" value="false"> --}}
    {{-- 送信ボタン --}}
    <button type="submit" class="btn btn_resist">登録</button>
  </form>
</div>