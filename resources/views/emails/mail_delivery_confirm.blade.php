<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>配送予定時間のお知らせ</title>
</head>
<body>
  <h1>{{$name}}様</h1>
  <p>本日、以下の予約時間に商品をお持ちいたします。</p>
  
  @if($text == '0')
  <p>店舗での受け取り</p>
  <p>営業時間内での受け取りをお願いいたします。</p>
  @else
  <p>配達便：{{$text}}便</p>
  <p>配達時間：
    @if($text == '1') 10:00～12:00
    @elseif($text == '2') 12:00～14:00
    @elseif($text == '3') 14:00～16:00
    @elseif($text == '4') 16:00～18:00
    @elseif($text == '5') 18:00～20:00
    @endif
  </p>
  @endif
  <p><a href="/">トップページ</a></p>
  <p><a href="/mypage?tab_item=2">購入品の確認</a></p>
</body>
</html>