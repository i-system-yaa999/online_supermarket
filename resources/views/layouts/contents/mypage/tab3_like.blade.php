{{-- mypage.blade.php にてinclude --}}

{{-- お気に入り商品 --}}
<div class="tab_content" id="tab3_content">
  <div class="content_nav">
    <h3>お気に入り商品</h3>
    {{-- @if(isset($likes)) --}}
    {{-- <p>{{$likes->total()}}件の商品が見つかりました。</p> --}}

    {{-- ページネーション --}}
    {{-- @include('layouts.pagenation',['items' => $likes]) --}}

    {{-- @endif --}}


  </div>
  {{-- コンテンツ --}}
  <div class="content_data">
    @if(isset($likes))
    {{-- {{dd(count($products))}} --}}
    @foreach($likes as $like)
    
    @include('layouts.item_data',['product'=>$like->product])
    
    @endforeach
    @else
    <p>お気に入り登録された商品はありません。</p>
    @endif
  </div>
  
  {{-- 詳細ウィンドウ --}}
  @if(isset($likes))
  {{-- {{dd(count($products))}} --}}
  @foreach($likes as $like)
  
  <div id="window_backframe{{$like->product->id}}" class="window_backframe is-hidden">
    <div class="window_background" onclick="hideDetail({{$like->product->id}})">
    </div>
    <div class="window">
      @include('layouts.item_detail',['product'=>$like->product])
    </div>
  </div>
  
  @endforeach
  @endif
  
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
    // document.getElementById('area_name').innerHTML = "#" + product.product_area_name.value;
    // document.getElementById('price').innerHTML = product.product_price.value;
    // document.getElementById('description').innerHTML = product.product_description.value;
    // document.getElementById('image').src = product.product_image.value;
    }
    function hideDetail(id){
    document.getElementById('window_backframe' + id).classList.toggle('is-hidden');
    // sessionStorage.setItem('is-hidden','false');
    }
    </script>