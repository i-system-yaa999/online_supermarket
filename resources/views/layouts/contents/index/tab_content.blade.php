{{-- index.blade.php にてinclude --}}

{{-- 全ての商品 --}}
<div class="tab_content" id="tab0_content">
  <div class="content_nav">
    @if(isset($products))
    {{-- <p>{{$products->total()}}件の商品が見つかりました。</p> --}}

    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $products])

    @endif
    @if($tab_item==1)
    @include('layouts.areas_selector')
    @endif
    @if($tab_item==2)
    @include('layouts.search_name')
    @endif

  </div>
  {{-- コンテンツ --}}
  <div class="content_data">
    @if(isset($products))
    {{-- {{dd(count($products))}} --}}
    @foreach($products as $product)

    @include('layouts.item_data')

    @endforeach
    @endif
  </div>

  {{-- 詳細ウィンドウ --}}
  @if(isset($products))
  {{-- {{dd(count($products))}} --}}
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
  {{-- @if(count($products) > 0)
  <div class="window_backframe is-hidden">
    <div class="window_background" onclick="hideDetail()">
    </div>
    <div class="window">
      @include('layouts.detail')
    </div>
  </div>
  @endif --}}
</div>

<script>
  function showDetail(id){
  document.getElementById('window_backframe' + id).classList.toggle('is-hidden');
  // sessionStorage.setItem('is-hidden','true');

  // let product = document.getElementById('product' + id);
  
  // document.getElementById('id').value = product.product_id.value;
  // document.getElementById('name').innerHTML = product.product_name.value;
  // document.getElementById('genre_id').value = product.product_genre_id.value;
  // document.getElementById('genre_name').innerHTML = "#" + product.product_genre_name.value;
  // document.getElementById('area_id').value = product.product_area_id.value;
  // document.getElementById('area_name').innerHTML = "#" + product.product_area_name.value + "産";
  // document.getElementById('price').innerHTML = product.product_price.value;
  // document.getElementById('description').innerHTML = product.product_description.value;
  // document.getElementById('image').src = product.product_image.value;
  }
  function hideDetail(id){
    document.getElementById('window_backframe' + id).classList.toggle('is-hidden');
    // sessionStorage.setItem('is-hidden','false');
  }
</script>