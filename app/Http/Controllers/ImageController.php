<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Models\Image;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        $image = Image::all();
        return back();
    }
    public function create(ImageRequest $request)
    {
        $file_name = $request->file('image_url')->getClientOriginalName();
        $image_url = $request->file('image_url')->storeAs('public/images/products', $file_name);
        $image = Image::create([
            'url' => str_replace('public/','', $image_url),
        ]);
        return back();
    }
    public function update(ImageRequest $request)
    {
        $image = Image::find($request->image_id)->update([
            'url' => $request->image_url,
        ]);
        return back();
    }
    public function delete(Request $request)
    {
        $image = Image::find($request->image_id)->delete();
        return back();
    }
}
