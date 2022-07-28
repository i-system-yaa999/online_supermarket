{{-- layouts\contents\admin\tab0_content.blade.php にてinclude --}}
{{-- layouts\contents\admin\tab1_content.blade.php にてinclude --}}
{{-- layouts\contents\admin\tab2_content.blade.php にてinclude --}}
{{-- layouts\contents\admin\tab3_content.blade.php にてinclude --}}
{{-- layouts\contents\admin\tab4_content.blade.php にてinclude --}}
{{-- layouts\contents\admin\tab5_content.blade.php にてinclude --}}
{{-- layouts\contents\index\tab_content.blade.php にてinclude --}}
{{-- layouts\contents\manage\tab0_add_product.blade.php にてinclude --}}
{{-- layouts\contents\manage\tab1_content.blade.php にてinclude --}}
{{-- layouts\contents\manage\tab2_add_product.blade.php にてinclude --}}
{{-- layouts\contents\manage\tab3_add_product.blade.php にてinclude --}}
{{-- layouts\contents\manage\tab4_add_product.blade.php にてinclude --}}
{{-- layouts\contents\manage\tab5_add_product.blade.php にてinclude --}}
{{-- layouts\contents\mypage\tab3_like.blade.php にてinclude --}}

{{-- ページネーション --}}
<div class="page_info">
  <div class="page_counts">
    全{{$items->total()}}件中
    @if($items->total() > 0)
    {{$items->firstItem()}}～{{$items->lastItem()}}件
    @endif
  </div>
  @if($items->total() > 0)
  {{$items->appends(request()->input())->links('pagination::bootstrap-4')}}
  @endif
</div>