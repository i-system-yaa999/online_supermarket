<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/common.css')}}">
  <link rel="stylesheet" href="{{asset('css/sub/header.css')}}">
  <link rel="stylesheet" href="{{asset('css/sub/hamburger_menu.css')}}">
  <link rel="stylesheet" href="{{asset('css/sub/footer.css')}}">
  <link rel="stylesheet" href="{{asset('css/sub/msgbox.css')}}">
  <link rel="stylesheet" href="{{asset('css/sub/pagination.css')}}">
  <link rel="stylesheet" href="{{asset('css/sub/window.css')}}">
  <link rel="stylesheet" href="{{asset('css/sub/item.css')}}">
  <link rel="stylesheet" href="{{asset('css/sub/like.css')}}">
  <link rel="stylesheet" href="{{asset('css/sub/qr.css')}}">

  @stack('stylesheet')

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet">
  
  <title>{{$title}}</title>
</head>

<body>
  <script src="{{asset('js/main.js')}}"></script>
  @include('layouts.header')
  <main class="content">
    {{$slot}}
  </main>
  @include('layouts.footer')
</body>

</html>