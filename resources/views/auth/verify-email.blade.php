@push('stylesheet')
<link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endpush
<x-layouts.auth title="メール未確認">
  <section class="msg_content">
    <div class="msg_box">
      <div class="msg_title">
        <p>{{$title}}</p>
      </div>
      <div class="msg_body">
        <p>確認メールを送信しました。</p>
        <p>メールに記載されたリンクボタンを押して認証を完了して下さい。</p>
        
        {{-- メール再送ボタン --}}
        <button class="btn btn_resend"><a href="{{ route('verification.resend') }}">メール再送</a></button>

        <form class="msg_form" method="POST" action="{{route('logout')}}">
          @csrf
          {{-- 送信ボタン --}}
          <div class="msg_window_button">
            <button type="submit" class="btn btn_logout">ログアウト</button>
          </div>
        </form>
        {{-- 退会ボタン --}}
        <button class="btn ">退会する</button>

      </div>
    </div>
  </section>
</x-layouts.auth>