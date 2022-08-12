{{-- mypage.blade.php にてinclude --}}

{{-- お気に入り商品 --}}
<div class="tab_content" id="tab3_content">
  <div class="content_nav">
    <h3>お気に入り商品</h3>
    @if(isset($likes))
    <p>{{$likes->total()}}件の商品が登録されています。</p>
    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $likes])
    @endif
  </div>
  {{-- コンテンツ --}}
  <div class="content_data">
    @if(count($likes) > 0)
    @foreach($likes as $like)
      @if(isset($like->product))
      @include('layouts.item_data',['product'=>$like->product])
      @endif
    @endforeach
    @else
    <p>お気に入り登録された商品はありません。</p>
    @endif
  </div>
  
  {{-- 詳細ウィンドウ --}}
  @if(isset($likes))
  @foreach($likes as $like)
  
  <div id="window_backframe{{$like->product->id ?? ''}}" class="window_backframe is-hidden">
    <div class="window_background" onclick="hideDetail({{$like->product->id ?? ''}})">
    </div>
    <div class="window">
      @if(isset($like->product))
      @include('layouts.item_detail',['product'=>$like->product])
      @endif
    </div>
  </div>
  
  @endforeach
  @endif
  
  </div>
