{{-- xxx --}}
<div class="tab_content" id="tab2_content">
  <div class="content_nav">
    @if(isset($areas))
    <p>{{$areas->total()}}件のデータが登録されています。</p>
    {{-- ページネーション --}}
    @include('layouts.pagenation',['items' => $areas])
    @endif
  </div>
  {{-- コンテンツ --}}
  <div class="content_data">

    <table>
      <thead class="tbl-products tbl-head">
        <tr>
          <th></th>
          <th class="item-center item-id">ID</th>
          <th>産地名</th>
          <th>作成日<br>------<br>更新日</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($areas as $area)
        <tr class="tbl-area @if($loop->iteration % 2) tbl-odd @else tbl-even @endif" id="tbl-item{{$area->id}}">
          {{-- チェックボックス --}}
          <td class="item-center item-checkbox">
            <input type="checkbox" name="" id="">
          </td>
          {{-- id --}}
          <td class="item-center item-id" name="area_id{{$area->id}}" id="area_id{{$area->id}}">
            {{$area->id}}
          </td>
          {{-- 産地名 --}}
          <td class="item-name">
            <input type="text" name="area_name{{$area->id}}" id="area_name{{$area->id}}" class="inputbox" value="{{$area->name}}">
            @if(($area->id==old('area_id')) && ($errors->has('area_name')))
            <div class="error_disp">{{$errors->first('area_name')}}</div>
            @endif
          </td>
          {{-- 作成日/更新日 --}}
          <td class="item-created">{{$area->created_at}}<span class="hr"></span>{{$area->updated_at}}</td>
          {{-- 登録ボタン --}}
          <td class="item-center item-modify">
            <form action="/">
              <input type="hidden" value="{{$area}}">
              <input type="hidden" value="{{$area->id}}">
              <input type="hidden" value="{{$area->name}}">
              <button class="btn btn-modify" type="submit">登録</button>
            </form>
          </td>
          {{-- 削除ボタン --}}
          <td class="item-center item-delete">
            <form action="/">
              <input type="hidden" value="{{$area->id}}">
              <button class="btn btn-delete" type="submit">削除</button>
            </form>
          </td>
          {{-- 終端 --}}
          <td class="item-terminal"></td>
        </tr>
        @endforeach
      </tbody>
    </table>



  </div>
</div>