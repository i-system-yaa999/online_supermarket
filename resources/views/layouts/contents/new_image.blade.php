{{-- 画像 --}}
<div id="new_image" class="new_image_window @if(empty(old('new_image_open'))) image_hide @endif">
  <div class="new_image_title">
    <h4>画像の新規登録</h4>
    <hr>
    <h5>画像を選択してください</h5>
  </div>
  <form class="new_image_form" method="POST" action="/img" enctype='multipart/form-data'>
    @csrf
    {{-- URL --}}
    <input type="text" name="image_url_path" id="image_url_path" class="" vale="{{old('image_url')}}">
    <label for="file" class="file_label">ファイルを選択</label>
    <input type="file" accept="image/*" name="image_url" id="file" class="file_input" onchange="addImage()">
    {{-- <input type="text" name="image_url" class="new_image_url" placeholder="画像URLを選んでください"
      vale="{{old('image_url')}}"> --}}
    @if($errors->has('image_url'))
    <div class="error_disp">{{$errors->first('image_url')}}</div>
    @endif
    {{-- ウィンドウフラグ --}}
    <input type="hidden" name="new_image_open" value="true">
    {{-- 送信ボタン --}}
    <button type="submit" class="btn btn_resist">登録</button>
  </form>
</div>
<script>
  function addImage(){
            document.getElementById('image_url_path').value = document.getElementById('file').value
          }
</script>