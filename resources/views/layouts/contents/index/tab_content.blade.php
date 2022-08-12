{{-- index.blade.php にてinclude --}}

{{-- 全ての商品 --}}
<div class="tab_content" id="tab0_content">
  <div class="content_nav">
    @if(isset($products))
    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $products])
    @endif

    {{-- 産地検索 --}}
    @if($tab_item==1)
    <form action="/">
      <input type="hidden" name="tab_item" value="{{$tab_item}}">
      <select name="selected_area" onchange="this.form.submit()">
        <option value="0">産地を選択してください</option>
        @if(isset($areas))
        @foreach($areas as $area)
        <option value="{{$area->id}}" @if($selected_area==$area->id) selected
          @endif>{{$area->name}}({{$area->getAreaCount()}}件)</option>
        @endforeach
        @endif
      </select>
    </form>
    @endif
    {{-- 名前検索 --}}
    @if($tab_item==2)
    <form action="/">
      <input type="hidden" name="tab_item" value="{{$tab_item}}">
      <p>検索したい商品の名前を入力してください</p>
      <label for="search_name"></label>
      <input type="text" name="search_name" value="{{$search_name}}" required>
      <button class="btn_search" type="submit">検索</button>
    </form>
    @endif

  </div>
  {{-- コンテンツ --}}
  <div class="content_data">
    @if(isset($products))
    @foreach($products as $product)
    @include('layouts.item_data')
    @endforeach
    @endif
  </div>

  {{-- 詳細ウィンドウ --}}
  @if(isset($products))
  @foreach($products as $product)
  
  <div id="window_backframe{{$product->id}}" class="window_backframe is-hidden">
    <div class="window_background" onclick="hideDetail({{$product->id}})">
    </div>
    <div class="window">
      @include('layouts.item_detail')
    </div>
  </div>
  
  @endforeach
  @endif
</div>
