{{-- 売り場 --}}
<div id="new_genre" class="new_genre_window @if(empty(old('new_genre_open'))) genre_hide @endif">
  <div class="new_genre_title">
    <p>売り場の名称を入力してください</p>
  </div>
  <form class="new_genre_form" method="POST" action="/genre">
    @csrf
    {{-- 名称 --}}
    <input type="text" name="genre_name" class="new_genre_name" placeholder="売り場名" vale="{{old('genre_name')}}">
    @if($errors->has('genre_name'))
    <div class="error_disp">{{$errors->first('genre_name')}}</div>
    @endif
    {{-- ウィンドウフラグ --}}
    <input type="hidden" name="new_genre_open" value="true">
    {{-- 送信ボタン --}}
    <button type="submit" class="btn btn_resist">登録</button>
  </form>
</div>