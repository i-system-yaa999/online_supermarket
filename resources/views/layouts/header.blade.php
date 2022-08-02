{{-- components\layouts\toppage.blade.php にてinclude --}}
{{-- components\layouts\auth.blade.php にてinclude --}}

<script src="{{asset('js/header.js')}}"></script>

<header class="header">
  <a href="/" class="title_frame">
    <img class="image" src="{{asset('images/redsuper.jpg')}}" alt="RedSuperMarket">
    <h1 class="title">レッドスーパー</h1>
  </a>
  <div class="nav_frame">
    <div class="auth_name">
      @if (Auth::check())
      <p>ようこそ {{Auth::user()->name}} さん</p>
      @endif
    </div>
    <nav class="nav">
      <ul>
        <li class="media_onry"><a href="/">トップページ</a></li>
        @if (Auth::check())
        {{-- システム管理者権限のみに表示される --}}
        @can('admin-onry')
        <li><a href="/admin">システム管理</a></li>
        <li><a href="/manage">商品管理</a></li>
        <li><a href="/mypage">マイページ</a></li>
        {{-- 売り場担当者以上に表示される --}}
        @elsecan('manager-higher')
        <li><a href="/manage">商品管理</a></li>
        <li><a href="/mypage">マイページ</a></li>
        {{-- 一般権限以上に表示される --}}
        @elsecan('user-higher')
        <li><a href="/mypage">マイページ</a></li>
        @endcan
        <li><a href="/logout">ログアウト</a></li>
        @else
        {{-- <li><a href="{{route('register')}}">新規登録</a></li>
        <li><a href="{{route('login')}}">ログイン</a></li> --}}
        <li><a href="/register">新規登録</a></li>
        <li><a href="/login">ログイン</a></li>
        @endif
      </ul>
    </nav>
    <button class="nav-button" type="button" onclick="navFunc()"></button>
  </div>
</header>