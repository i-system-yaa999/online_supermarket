<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ご購入完了のお知らせ</title>
</head>

<body>
  <h1>{{ $name }}様</h1>
  <p>クレジットカードによる決済が完了し、ご購入が完了しました。</p>
  <p>今回ご購入いただいた商品は、以下の配送日時にて</p>
  <p>お届けを予定しております。</p>
  <p>　</p>
  <hr>
  @if($number == 0)
  <p>店舗での受け取り</p>
  <p>営業時間内での受け取りをお願いいたします。</p>
  @else
  <p>配達便：{{$number}}便</p>
  <p>配達時間：
    @if($number == 1) 10:00～12:00
    @elseif($number == 2) 12:00～14:00
    @elseif($number == 3) 14:00～16:00
    @elseif($number == 4) 16:00～18:00
    @elseif($number == 5) 18:00～20:00
    @endif
  </p>
  @endif
  <p><a href="/">トップページに戻る</a></p>

  @if(isset($histories))
  <table>
    <thead>
      <tr>
        <th>商品名</th>
        <th>個数</th>
        <th>小計</th>
      </tr>
    </thead>
    <tbody>
      @foreach($histories as $history)
      <tr>
        <td>{{$history->name}}</td>
        <td>{{$history->quantity}}個</td>
        <td>{{$history->subtotal}}円</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <p>お支払い合計：{{\app\Models\Order::total()}}円</p>
  @else
  <p><a href="/mypage?tab_item=2">購入品の確認</a></p>
  @endif
  

</body>

</html>