@push('stylesheet')
<link rel="stylesheet" href="{{asset('css/manage.css')}}">
@endpush
<x-layouts.toppage title="マネージャー">
  <section class="content_main">
    <h3>商品管理</h3>

    {{-- select メニュー --}}
    <form id="" action="/manage">
      <select name="tab_item" id="" class="select_menu" value="{{old('tab_item')}}" onChange="this.form.submit()">
        <option value="0" @if($tab_item==='0' |empty($tab_item)) selected @endif>商品の編集</option>
        <option value="1" @if($tab_item==='1' ) selected @endif>売り場の編集</option>
        <option value="2" @if($tab_item==='2' ) selected @endif>産地の編集</option>
        <option value="3" @if($tab_item==='3' ) selected @endif>商品画像の編集</option>
        <option value="4" @if($tab_item==='4' ) selected @endif>商品の評価一覧</option>
        <option value="5" @if($tab_item==='5' ) selected @endif>商品の追加登録</option>
        {{-- <option value="6" @if($tab_item==='6' ) selected @endif>その他</option> --}}
      </select>
    </form>
    
    {{-- tab メニュー --}}
    <div>
      <form id="form_tabs" class="tabs" action="/manage">
        <!-- tab menu 商品の編集 -->
        <input type="radio" name="tab_item" id="products" value="0" @if($tab_item==='0'|empty($tab_item)) checked @endif onChange="this.form.submit()">
        <label class=" tab_item" for="products">商品の編集</label>

        <!-- tab menu 売り場の編集 -->
        <input type="radio" name="tab_item" id="genres" value="1" @if($tab_item==1) checked @endif onChange="this.form.submit()">
        <label class=" tab_item" for="genres">売り場の編集</label>

        <!-- tab menu 産地の編集 -->
        <input type="radio" name="tab_item" id="areas" value="2" @if($tab_item==2) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="areas">産地の編集</label>

        <!-- tab menu 商品画像の編集 -->
        <input type="radio" name="tab_item" id="images" value="3" @if($tab_item==3) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="images">商品画像の編集</label>

        <!-- tab menu 商品の評価一覧 -->
        <input type="radio" name="tab_item" id="comments" value="4" @if($tab_item==4) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="comments">商品の評価一覧</label>

        <!-- tab menu 商品の追加登録 -->
        <input type="radio" name="tab_item" id="new_product" value="5" @if($tab_item==5) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="new_product">商品の追加登録</label>

      </form>
    </div>

    {{-- tab contents 商品の編集 --}}
    @if($tab_item === '0' | empty($tab_item))
    @include('layouts.contents.manage.tab0_edit_product')
    @endif

    {{-- tab contents 売り場の編集 --}}
    @if($tab_item === '1')
    @include('layouts.contents.manage.tab1_edit_genre')
    @endif

    {{-- tab contents 産地の編集 --}}
    @if($tab_item === '2')
    @include('layouts.contents.manage.tab2_edit_area')
    @endif

    {{-- tab contents 商品画像の編集 --}}
    @if($tab_item === '3')
    @include('layouts.contents.manage.tab3_edit_image')
    @endif

    {{-- tab contents 商品の評価一覧 --}}
    @if($tab_item === '4')
    @include('layouts.contents.manage.tab4_comments')
    @endif

    {{-- tab contents 商品の追加登録 --}}
    @if($tab_item === '5')
    @include('layouts.contents.manage.tab5_new_product')
    @endif

  </section>
</x-layouts.toppage>