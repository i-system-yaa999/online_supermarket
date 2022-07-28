@push('stylesheet')
<link rel="stylesheet" href="{{asset('css/thanks.css')}}">
@endpush
<x-layouts.toppage title="購入完了">
  <section class="msg_content">
    <div class="msg_box">
      <div class="msg_title">
        <p>購入完了</p>
      </div>
      <div class="msg_body">
        <p>ご購入ありがとうございました。</p>
        <p>商品配達の際に下記のＱＲを配達員に提示してください。</p>
        <hr>
        <p>注文番号：{{$delivery->id ?? ''}}</p>
        <p>配達番号：{{$delivery->id ?? ''}}</p>
        <p>配達日時：{{$delivery->id ?? ''}}</p>
        <p>お客様名 : {{$user->name ?? ''}}様</p>
        {{-- <div class="qr">{!!$qrcode!!}</div> --}}
        <p><a href="/">トップページに戻る</a></p>
        <p>購入商品</p>
      </div>
    </div>
  </section>
</x-layouts.toppage>