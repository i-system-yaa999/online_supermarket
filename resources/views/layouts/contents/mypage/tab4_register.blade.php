{{-- mypage.blade.php にてinclude --}}

{{-- 登録メールアドレスの変更 --}}
<div class="tab_content" id="tab4_content">
  <div class="my_content_nav">
    <h3>登録メールアドレスの変更</h3>
  </div>
  {{-- コンテンツ --}}
  <div class="my_content_data">

    <section class="msg_content">
      <div class="msg_box">
        <div class="msg_title">
          <p>登録メールアドレスの変更</p>
        </div>
        <div class="msg_body">
          <form action="/user" method="POST" class="msg_form">
            @method('PUT')
            @csrf
        
            {{-- ユーザ名 --}}
            <div class="msg_window_name">
              <input type="hidden" class="disp_input" name="user_id" value="{{Auth::id()}}">
              <input type="hidden" class="disp_input" name="user_name" value="{{Auth::user()->name}}" placeholder="ユーザー名" readonly>
              <input type="text" class="disp_error" name="disp_error" value="{{$errors->first('user_name')}}" disabled>
            </div>
        
            {{-- 現在のメールアドレス --}}
            <div class="msg_window_mail">
              <label for="old_user_email">現在のメールアドレス</label>
              <input type="email" class="disp_input" name="old_user_email" value="{{Auth::user()->email}}" readonly>
            </div>

            {{-- 新しいメールアドレス --}}
            <div class="msg_window_mail">
              <p>　</p>
              <label for="user_email">新しいメールアドレス</label>
              <input type="email" class="disp_input" name="user_email" value="{{old('email')}}" placeholder="メールアドレス">
              <input type="text" class="disp_error" name="disp_error" value="{{$errors->first('user_email')}}" disabled>
            </div>

            {{-- パスワード --}}
            <div class="msg_window_password">
              <input type="hidden" class="disp_input" name="user_password" placeholder="password" value="{{old('user_password', Auth::user()->password)}}" readonly>
              <input type="text" class="disp_error" name="disp_error" value="{{$errors->first('user_password')}}" disabled>
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