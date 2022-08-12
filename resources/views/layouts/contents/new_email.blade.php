{{-- メール送信 --}}
<div id="new_email" class="new_email_window @if(empty(old('new_email_open'))) email_hide @endif">
  <div class="new_email_title">
    <h4>新規メール作成</h4>
    <hr>
    <h5>送信内容を記入してください</h5>
  </div>
  <form action="/email" method="POST" class="new_email_form">
    @csrf

    {{-- ユーザ名 --}}
    <div class="user_name">
      <p>送信先ユーザー名</p>
      <div class="error_disp">{{$errors->first('user_name')}}</div>
      <select name="user_name" class="selectbox new_email_to">
        @foreach($allusers as $user)
        <option value="{{$user->name}}" @if(old('user_name') == $user->name) selected @endif>
          {{$user->id.'：'.$user->name}}
        </option>
        @endforeach
      </select>
    </div>

    {{-- メールアドレス --}}
    <div class="mail_address">
      <p>送信先メールアドレス</p>
      <div class="error_disp">{{$errors->first('user_email')}}</div>
      <input type="text" id="user_email" name="user_email"  class="inputbox new_email_address" value="{{old('user_email')}}">
    </div>

    {{-- メールタイトル --}}
    <div class="mail_title">
      <p>メールタイトル</p>
      <div class="error_disp">{{$errors->first('mail_title')}}</div>
      <input type="text" name="mail_title" class="inputbox new_email_title" value="{{old('mail_title')}}">
    </div>

    {{-- メール本文 --}}
    <div class="message">
      <p>メール本文</p>
      <div class="error_disp">{{$errors->first('mail_message')}}</div>
      <textarea name="mail_message" class="new_email_message">{{old('mail_message')}}</textarea>
    </div>

    {{-- ウィンドウフラグ --}}
    <input type="hidden" name="new_email_open" value="true">
    {{-- 送信ボタン --}}
    <button type="submit" class="btn btn_new_email">送信</button>
  </form>
</div>