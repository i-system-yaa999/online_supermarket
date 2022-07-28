{{-- mypage.blade.php にてinclude --}}

{{-- お客様情報の変更 --}}
<div class="tab_content" id="tab4_content">
  <div class="my_content_nav">
    <h3>お客様情報の変更</h3>
  </div>
  {{-- コンテンツ --}}
  <div class="my_content_data">

    <section class="msg_content">
      <div class="msg_box">
        <div class="msg_title">
          <p>お客様情報の変更</p>
        </div>
        <div class="msg_body">
          <form class="msg_form" method="POST" action="/register">
            @csrf
        
            {{-- ユーザ名 --}}
            <div class="msg_window_name">
              <input type="text" class="disp_input" name="name" value="{{Auth::user()->name}}" placeholder="ユーザー名">
              <input type="text" class="disp_error" name="disp_error" value="{{$errors->first('name')}}" disabled="disabled">
            </div>
        
            {{-- メールアドレス --}}
            <div class="msg_window_mail">
              <input type="email" class="disp_input" name="email" value="{{old('email', Auth::user()->email)}}" placeholder="メールアドレス">
              <input type="text" class="disp_error" name="disp_error" value="{{$errors->first('email')}}" disabled="disabled">
            </div>
        
            {{-- パスワード --}}
            <div class="msg_window_password">
              <input type="password" class="disp_input" name="password" placeholder="password" value="{{old('password')}}">
              <input type="text" class="disp_error" name="disp_error" value="{{$errors->first('password')}}" disabled="disabled">
            </div>
        
            {{-- パスワード確認 --}}
            <div class="msg_window_password">
              <input type="password" class="disp_input" name="password_confirmation" placeholder="password確認">
              <input type="heidden" class="disp_error" name="disp_error" value="{{$errors->first('password')}}" disabled="disabled">
            </div>
        
            {{-- 送信ボタン --}}
            <div class="msg_window_button">
              <button type="submit" class="btn btn_resist">変更する</button>
            </div>
        
          </form>
        </div>
      </div>
    </section>
    
    
  </div>
</div>