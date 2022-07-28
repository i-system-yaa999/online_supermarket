@push('stylesheet')
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endpush
<x-layouts.toppage title="Red SuperMarket">
  <section class="content_main">
    <h3>システム管理</h3>

    {{-- select メニュー --}}
    <form id="" action="/admin">
      <select name="tab_item" id="" class="select_menu" value="{{old('tab_item')}}" onChange="this.form.submit()">
        <option value="0" @if($tab_item==='0' |empty($tab_item)) selected @endif>店舗担当者</option>
        <option value="1" @if($tab_item==='1' ) selected @endif>ユーザー</option>
        <option value="2" @if($tab_item==='2' ) selected @endif>商品</option>
        <option value="4" @if($tab_item==='3' ) selected @endif>画像</option>
        <option value="3" @if($tab_item==='4' ) selected @endif>売り場</option>
        <option value="4" @if($tab_item==='5' ) selected @endif>産地</option>
        <option value="5" @if($tab_item==='6' ) selected @endif>配達予約</option>
        <option value="6" @if($tab_item==='7' ) selected @endif>お気に入り</option>
        <option value="7" @if($tab_item==='8' ) selected @endif>評価</option>
      </select>
    </form>
    
    {{-- tab メニュー --}}
    <div>
      <form id="form_tabs" class="tabs" action="/admin">
        <!-- tab menu 店舗担当者 -->
        <input type="radio" name="tab_item" id="manage" value="0" @if($tab_item==='0' |empty($tab_item)) checked @endif onChange="this.form.submit()">
        <label class=" tab_item" for="manage">店舗担当者</label>

        <!-- tab menu ユーザー -->
        <input type="radio" name="tab_item" id="user" value="1" @if($tab_item==1) checked @endif onChange="this.form.submit()">
        <label class=" tab_item" for="user">ユーザー</label>

        <!-- tab menu 商品 -->
        <input type="radio" name="tab_item" id="product" value="2" @if($tab_item==2) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="product">商品</label>

        <!-- tab menu 画像 -->
        <input type="radio" name="tab_item" id="image" value="3" @if($tab_item==3) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="image">画像</label>
        
        <!-- tab menu 売り場 -->
        <input type="radio" name="tab_item" id="genre" value="4" @if($tab_item==4) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="genre">売り場</label>

        <!-- tab menu 産地 -->
        <input type="radio" name="tab_item" id="area" value="5" @if($tab_item==5) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="area">産地</label>

        <!-- tab menu 配達予約 -->
        <input type="radio" name="tab_item" id="delivery" value="6" @if($tab_item==6) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="delivery">配達予約</label>
        
        <!-- tab menu お気に入り -->
        <input type="radio" name="tab_item" id="like" value="7" @if($tab_item==7) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="like">お気に入り</label>

        <!-- tab menu 評価 -->
        <input type="radio" name="tab_item" id="comment" value="8" @if($tab_item==8) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="comment">評価</label>

      </form>
    </div>

    {{-- tab contents 店舗担当者 --}}
    @if($tab_item === '0' | empty($tab_item))
    @include('layouts.contents.admin.tab0_content')
    @endif

    {{-- tab contents ユーザー --}}
    @if($tab_item === '1')
    @include('layouts.contents.admin.tab1_content')
    @endif

    {{-- tab contents 商品 --}}
    @if($tab_item === '2')
    @include('layouts.contents.admin.tab2_content')
    @endif

    {{-- tab contents 画像 --}}
    @if($tab_item === '3')
    @include('layouts.contents.admin.tab3_content')
    @endif

    {{-- tab contents 売り場 --}}
    @if($tab_item === '4')
    @include('layouts.contents.admin.tab4_content')
    @endif

    {{-- tab contents 産地 --}}
    @if($tab_item === '5')
    @include('layouts.contents.admin.tab5_content')
    @endif
    
    {{-- tab contents 配達予約 --}}
    @if($tab_item === '6')
    @include('layouts.contents.admin.tab6_content')
    @endif

    {{-- tab contents お気に入り --}}
    @if($tab_item === '7')
    @include('layouts.contents.admin.tab7_content')
    @endif

    {{-- tab contents 評価 --}}
    @if($tab_item === '8')
    @include('layouts.contents.admin.tab8_content')
    @endif

  </section>
  {{-- @endsection --}}
</x-layouts.toppage>