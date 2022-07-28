@push('stylesheet')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}">
@endpush
<x-layouts.toppage title="マイページ">
  <section class="content_main">
    <h3>マイページ</h3>

    {{-- select メニュー --}}
    <form id="" action="/mypage">
      <select name="tab_item" id="" class="select_menu" value="{{old('tab_item')}}" onChange="this.form.submit()">
        <option value="0" @if($tab_item==='0' |empty($tab_item)) selected @endif>カート</option>
        <option value="1" @if($tab_item==='1' ) selected @endif>配達予約</option>
        <option value="2" @if($tab_item==='2' ) selected @endif>購入履歴</option>
        <option value="3" @if($tab_item==='3' ) selected @endif>お気に入り商品</option>
        <option value="4" @if($tab_item==='4' ) selected @endif>お客様情報の変更</option>
        <option value="5" @if($tab_item==='5' ) selected @endif>退会</option>
      </select>
    </form>
    
    {{-- tab メニュー --}}
    <div>
      <form id="form_tabs" class="tabs" action="/mypage">
        <!-- tab menu カート -->
        <input type="radio" name="tab_item" id="cart" value="0" @if($tab_item==='0'|empty($tab_item)) checked @endif onChange="this.form.submit()">
        <label class=" tab_item" for="cart">カート</label>

        <!-- tab menu 配達予約 -->
        <input type="radio" name="tab_item" id="reserve" value="1" @if($tab_item==1) checked @endif onChange="this.form.submit()">
        <label class=" tab_item" for="reserve">配達予約</label>

        <!-- tab menu 購入履歴 -->
        <input type="radio" name="tab_item" id="order_history" value="2" @if($tab_item==2) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="order_history">購入履歴</label>
        
        <!-- tab menu お気に入り商品 -->
        <input type="radio" name="tab_item" id="like" value="3" @if($tab_item==3) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="like">お気に入り商品</label>

        <!-- tab menu お客様情報の変更 -->
        <input type="radio" name="tab_item" id="register" value="4" @if($tab_item==4) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="register">お客様情報の変更</label>

        <!-- tab menu 退会 -->
        <input type="radio" name="tab_item" id="quit_member" value="5" @if($tab_item==5) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="quit_member">退会</label>

      </form>
    </div>

    {{-- tab contents カート --}}
    @if($tab_item === '0' | empty($tab_item))
    @include('layouts.contents.mypage.tab0_cart')
    @endif

    {{-- tab contents 配達予約 --}}
    @if($tab_item === '1')
    @include('layouts.contents.mypage.tab1_delivery')
    @endif

    {{-- tab contents 購入履歴 --}}
    @if($tab_item === '2')
    @include('layouts.contents.mypage.tab2_history')
    @endif
    
    {{-- tab contents お気に入り商品 --}}
    @if($tab_item === '3')
    @include('layouts.contents.mypage.tab3_like')
    @endif

    {{-- tab contents お客様情報の変更 --}}
    @if($tab_item === '4')
    @include('layouts.contents.mypage.tab4_register')
    @endif

    {{-- tab contents 退会 --}}
    @if($tab_item === '5')
    @include('layouts.contents.mypage.tab5_content')
    @endif

  </section>
</x-layouts.toppage>