{{-- layouts\item_data.blade.php にてinclude--}}
{{-- layouts\item_detail.blade.php にてinclude--}}

{{-- お気に入り --}}
@if($product->id ?? '')
<div class="disp_like">
  @auth
  @if(!empty($product->getLike()))
  {{-- お気に入り削除 --}}
  <form id="like_del" action="/like" method="POST">
    @method('DELETE')
    @csrf
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <button type="submit" class="like_on"></button>
  </form>
  @else
  {{-- お気に入り登録 --}}
  <form id="like_add" action="/like" method="POST">
    @csrf
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <button type="submit" class="like_off"></button>
  </form>
  @endif
  @endauth
  {{-- 登録者数 --}}
  <div class="like_count">
    <p>登録者数</p>
    @if(isset($product->like))
    <p>{{$product->likes_count()}}人</p>
    @else
    <p>0人</p>
    @endif
  </div>
</div>
@endif