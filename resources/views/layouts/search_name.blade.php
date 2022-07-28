{{-- layouts\contents\index\tab_content.blade.php にてinclude --}}

<form action="/">
  <input type="hidden" name="tab_item" value="{{$tab_item}}">
  <p>検索したい商品の名前を入力してください</p>
  <label for="search_name"></label>
  <input type="text" name="search_name" value="{{$search_name}}" required>
  <button class="btn_search" type="submit">検索</button>
</form>