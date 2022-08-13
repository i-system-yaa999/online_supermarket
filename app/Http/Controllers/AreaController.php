<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use App\Models\Area;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        $area = Area::all();
        return back();
    }
    public function create(AreaRequest $request)
    {
        $area = Area::create([
            'name' => $request->area_name,
        ]);
        return back();
    }
    public function update(AreaRequest $request)
    {
        $area = Area::find($request->area_id)->update([
            'name' => $request->area_name,
        ]);
        return back();
    }
    public function delete(Request $request)
    {
        $area = Area::find($request->area_id)->delete();
        return back();
    }
}
