{{-- ユーザー --}}
<div id="new_user" class="new_user_window @if(empty(old('new_user_open'))) user_hide @endif">
  <div class="new_user_title">
    <h4>ユーザーの新規作成</h4>
    <hr>
    <h5>項目を入力してください</h4>
  </div>
  <form class="new_user_form" method="POST" action="/user">
    @csrf
    
    {{-- ユーザ名 --}}
    <div class="msg_window_name">
      <input type="text" class="disp_input" name="name" value="{{ old('name') }}" placeholder="ユーザー名">
      <input type="text" class="disp_error" name="disp_error" value="{{$errors->first('name')}}" disabled="disabled">
    </div>

    {{-- メールアドレス --}}
    <div class="msg_window_mail">
      <input type="email" class="disp_input" name="email" value="{{old('email')}}" placeholder="メールアドレス">
      <input type="text" class="disp_error" name="disp_error" value="{{$errors->first('email')}}" disabled="disabled">
    </div>

    {{-- パスワード --}}
    <div class="msg_window_password">
      <input type="password" class="disp_input" name="password" placeholder="password">
      <input type="text" class="disp_error" name="disp_error" value="{{$errors->first('password')}}"
        disabled="disabled">
    </div>

    {{-- パスワード確認 --}}
    <div class="msg_window_password">
      <input type="password" class="disp_input" name="password_confirmation" placeholder="password確認">
      <input type="heidden" class="disp_error" name="disp_error" value="{{$errors->first('password')}}"
        disabled="disabled">
    </div>
    
    {{-- ウィンドウフラグ --}}
    <input type="hidden" name="new_user_open" value="true">
    {{-- <input type="hidden" name="new_email_open" value="false"> --}}
    {{-- 送信ボタン --}}
    <button type="submit" class="btn btn_resist">登録</button>
  </form>
</div>