{{-- layouts\contents\index\tab_content.blade.php にてinclude --}}

<form action="/">
  <input type="hidden" name="tab_item" value="{{$tab_item}}">
  <select name="selected_area" onchange="this.form.submit()">
    <option value="0">産地を選択してください</option>
    @if(isset($areas))
    @foreach($areas as $area)
    <option value="{{$area->id}}" @if($selected_area==$area->id) selected @endif>{{$area->name}}({{$area->getAreaCount()}}件)</option>
    @endforeach
    @endif
  </select>
</form>