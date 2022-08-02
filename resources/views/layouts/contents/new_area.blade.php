{{-- 産地 --}}
<div id="new_area" class="new_area_window @if(empty(old('new_area_open'))) area_hide @endif">
  <div class="new_area_title">
    <h4>産地名の新規作成</h4>
    <hr>
    <h5>産地の名称を入力してください</h5>
  </div>
  <form class="new_area_form" method="POST" action="/area">
    @csrf
    {{-- 名称 --}}
    <input type="text" name="area_name" class="new_area_name" placeholder="産地名" vale="{{old('area_name')}}">
    @if($errors->has('area_name'))
    <div class="error_disp">{{$errors->first('area_name')}}</div>
    @endif
    {{-- ウィンドウフラグ --}}
    <input type="hidden" name="new_area_open" value="true">
    {{-- 送信ボタン --}}
    <button type="submit" class="btn btn_resist">登録</button>
  </form>
</div>