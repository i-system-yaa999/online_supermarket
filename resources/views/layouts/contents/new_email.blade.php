{{-- メール送信 --}}
<div id="new_email" class="new_email_window @if(empty(old('new_email_open'))) email_hide @endif">
  <div class="new_email_title">
    <h4>新規メール作成</h4>
    <hr>
    <h5>送信内容を記入してください</h5>
  </div>
  <form class="new_email_form" method="POST" action="/email">
    @csrf

    {{-- ユーザ名 --}}
    <div class="user_name">
      <p>送信先ユーザー名</p>
      <select name="user_id" class="selectbox">
        @foreach($allusers as $user)
        <option value="{{$user->id}}" @if(($manager->user->id ?? '9999') == $user->id) selected @endif>
          {{$user->id.'：'.$user->name}}
        </option>
        @endforeach
      </select>
    </div>

    {{-- メールアドレス --}}
    <div class="mail_address">
      <p>送信先メールアドレス</p>
      <input type="text" id="user_email" name="user_email" value="{{old('user_email')}}">
    </div>

    {{-- メールタイトル --}}
    <div class="mail_title">
      <p>メールタイトル</p>
      <input type="text" name="" class="" value="{{old('')}}">
    </div>

    {{-- メール本文 --}}
    <div class="message">
      <p>メール本文</p>
      <textarea name="" class="">{{old('')}}</textarea>
      @if($errors->has(''))
      <div class="error_disp">{{$errors->first('')}}</div>
      @endif
    </div>

    {{-- ウィンドウフラグ --}}
    <input type="hidden" name="new_email_open" value="true">
    {{-- <input type="hidden" name="new_user_open" value="false"> --}}
    {{-- 送信ボタン --}}
    <button type="submit" class="btn btn_">送信</button>
  </form>
</div>