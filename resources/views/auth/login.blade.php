@push('stylesheet')
<link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endpush
<x-layouts.auth title="ログイン">
  <section class="msg_content">
    <div class="msg_box">
      <div class="msg_title">
        <p>ログイン</p>
      </div>
      <div class="msg_body">
        <form class="msg_form" method="POST" action="/login">
          @csrf

          {{-- メールアドレス --}}
          <div class="msg_window_mail">
            <input type="email" class="disp_input" name="email" value="{{old('email')}}" placeholder="メールアドレス">
            <input type="text" class="disp_error" name="disp_error" value="{{$errors->first('email')}}" disabled="disabled">
          </div>

          {{-- パスワード --}}
          <div class="msg_window_password">
            <input type="password" class="disp_input" name="password" placeholder="password">
            <input type="text" class="disp_error" name="disp_error" value="{{$errors->first('password')}}" disabled="disabled">
          </div>

          {{-- 送信ボタン --}}
          <div class="msg_window_button">
            <button type="submit" class="btn btn_login">ログイン</button>
          </div>

        </form>
      </div>
    </div>
  </section>
</x-layouts.auth>