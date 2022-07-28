@push('stylesheet')
{{-- <link rel="stylesheet" href="{{asset('css/.css')}}"> --}}
@endpush
<x-layouts.auth title="ログアウト">
  <section class="msg_content">
    <div class="msg_box">
      <div class="msg_title">
        <p>ログアウトしますか？</p>
      </div>
      <div class="msg_body">
        <form class="msg_form" method="POST" action="{{route('logout')}}">
          @csrf

          {{-- 送信ボタン --}}
          <div class="msg_window_button">
            <button type="submit" class="btn btn_logout">ログアウト</button>
          </div>

        </form>
      </div>
    </div>
  </section>
{{-- @endsection --}}
</x-layouts.auth>