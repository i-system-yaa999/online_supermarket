{{-- 商品の追加 --}}
<div class="tab_content" id="tab0_content">
  <div class="content_nav">
    @if(isset($products))
    <p>{{$products->total()}}件の商品が見つかりました。</p>

    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $products])

    @endif
    

  </div>
  {{-- コンテンツ --}}
  <div class="content_data">
  </div>
</div>