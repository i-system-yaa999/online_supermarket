@push('stylesheet')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endpush
<x-layouts.toppage title="Red SuperMarket">
  <section class="content_main">

    {{-- select メニュー --}}
    <form id="" action="/">
      <select name="tab_item" id="" class="select_menu" value="{{old('tab_item')}}" onChange="this.form.submit()">
        <option value="0" @if($tab_item==='0'|empty($tab_item)) selected @endif>全ての商品</option>

        @foreach ($allgenres as $genre)
        <option value="{{$loop->iteration + 2}}" @if($tab_item==($loop->iteration + 2)) selected @endif>{{$genre->name}}</option>
        @endforeach
        
        <option value="1" @if($tab_item==='1' ) selected @endif>産地別</option>
        <option value="2" @if($tab_item==='2') selected @endif>検索</option>
      </select>
    </form>

    {{-- tab メニュー --}}
    <div>
      <form id="form_tabs" class="tabs" action="/">
        <!-- tab menu すべて -->
        <input type="radio" name="tab_item" id="all" value="0" @if($tab_item==='0'|empty($tab_item)) checked @endif onChange="this.form.submit();">
        <label class="tab_item" for="all">全ての商品</label>

        {{-- tab menu --}}
        @foreach ($allgenres as $genre)
        <input type="radio" name="tab_item" id="genre{{$loop->iteration + 2}}" value="{{$loop->iteration + 2}}" @if($tab_item==($loop->iteration + 2)) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="genre{{$loop->iteration + 2}}">{{$genre->name}}</label>
        @endforeach

        <!-- tab menu 産地別 -->
        <input type="radio" name="tab_item" id="search1" value="1" @if($tab_item==1) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="search1">産地別</label>

        <!-- tab menu 検索 -->
        <input type="radio" name="tab_item" id="search2" value="2" @if($tab_item == 2) checked @endif onChange="this.form.submit()">
        <label class="tab_item" for="search2">検索</label>
        
      </form>
    </div>

      {{-- tab contents --}}
      @include('layouts.contents.index.tab_content')

  </section>

</x-layouts.toppage>