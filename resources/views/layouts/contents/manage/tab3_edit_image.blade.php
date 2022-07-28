{{-- xxx --}}
<div class="tab_content" id="tab3_content">
  <div class="content_nav">
    @if(isset($images))
    <p>{{$images->total()}}件のデータが登録されています。</p>
    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $images])
    @endif
  </div>
  {{-- コンテンツ --}}
  <div class="content_data">

    <table>
      <thead class="tbl-products tbl-head">
        <tr>
          <th></th>
          <th class="list_center list_id">ID</th>
          <th>URL</th>
          <th></th>
          <th>作成日<br>------<br>更新日</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($images as $image)
        <tr class="tbl-image @if($loop->iteration % 2) tbl-odd @else tbl-even @endif" id="tbl-item{{$image->id}}">
          {{-- チェックボックス --}}
          <td class="list_center list_checkbox">
            <input type="checkbox" name="" id="">
          </td>
          {{-- id --}}
          <td class="list_center list_id" name="image_id{{$image->id}}" id="image_id{{$image->id}}">
            {{$image->id}}
          </td>
          {{-- URL --}}
          <td class="list_imageURL">
            <input type="text" name="image_url{{$image->url}}" id="image_url{{$image->id}}" class="inputbox" value="{{$image->url}}">
            @if(($image->id==old('image_id')) && ($errors->has('image_url')))
            <div class="error_disp">{{$errors->first('image_url')}}</div>
            @endif
          </td>
          {{-- 変更ボタン --}}
          <td class="list_center list_upload">
            <button class="btn btn-upload">画像変更</button>
          </td>
          {{-- 作成日/更新日 --}}
          <td class="list_created">{{$image->created_at}}<span class="hr"></span>{{$image->updated_at}}</td>
          {{-- 登録ボタン --}}
          <td class="list_center list_modify">
            <form action="/">
              <input type="hidden" value="{{$image}}">
              <input type="hidden" value="{{$image->id}}">
              <input type="hidden" value="{{$image->name}}">
              <button class="btn btn-modify" type="submit">登録</button>
            </form>
          </td>
          {{-- 削除ボタン --}}
          <td class="list_center list_delete">
            <form action="/">
              <input type="hidden" value="{{$image->id}}">
              <button class="btn btn-delete" type="submit">削除</button>
            </form>
          </td>
          {{-- 終端 --}}
          <td class="list_terminal"></td>
        </tr>
        @endforeach
      </tbody>
    </table>



  </div>
</div>