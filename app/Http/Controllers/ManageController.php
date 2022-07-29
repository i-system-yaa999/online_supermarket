<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Image;
use App\Http\Requests\AreaRequest;
use App\Http\Requests\GenreRequest;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\ProductRequest;

class ManageController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 8;
        $columns = ['*'];
        $pageName = 'managespage';

        $products = null;
        $genres = null;
        $areas = null;
        $images = null;
        switch ($request->tab_item) {
            case 0:
                $products = Product::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);                break;
            case 1:
                $genres = Genre::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 2:
                $areas = Area::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 3:
                $images = Image::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
        }

        return view('manage')->with([
            'tab_item' => $request->tab_item,
            'products' => $products,
            'genres' => $genres,
            'areas' => $areas,
            'images' => $images,
            'allgenres' =>  Genre::all(),
            'allareas' =>  Area::all(),
            'allimages' =>  Image::all(),
        ]);
    }

    public function create(Request $request)
    {
        $perPage = 8;
        $columns = ['*'];
        $pageName = 'managespage';

        switch ($request->tab_item) {
            case 0:
                $product = new ProductRequest;
                $validator = Validator::make($request->all(), $product->rules(), $product->messages());
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                Product::create([
                    'name' => $request->input('product_name'),
                    'area_id' => $request->input('product_area_id'),
                    'genre_id' => $request->input('product_genre_id'),
                    'price' => $request->input('product_price'),
                    'description' => $request->input('product_description'),
                    'image_id' => $request->input('product_image_id'),
                ]);
                break;
            case 1:
                $genre = new GenreRequest;
                $validator = Validator::make($request->all(), $genre->rules(), $genre->messages());
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                Genre::create([
                    'name' => $request->input('genre_name'),
                ]);
                break;
            case 2:
                $area = new AreaRequest;
                $validator = Validator::make($request->all(), $area->rules(), $area->messages());
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                Area::create([
                    'name' => $request->input('area_name'),
                ]);
                break;
            case 3:
                $image = new ImageRequest;
                $validator = Validator::make($request->all(), $image->rules(), $image->messages());
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                Image::create([
                    'url' => $request->input('image_url'),
                ]);
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
        }

        return back();
    }

    public function update(Request $request)
    {
        $perPage = 8;
        $columns = ['*'];
        $pageName = 'managespage';

        switch ($request->tab_item) {
            case 0:
                $product = new ProductRequest;
                $validator = Validator::make($request->all(), $product->rules(), $product->messages());
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                Product::find($request->product_id)->update([
                    'name' => $request->input('product_name'),
                    'area_id' => $request->input('product_area_id'),
                    'genre_id' => $request->input('product_genre_id'),
                    'price' => $request->input('product_price'),
                    'description' => $request->input('product_description'),
                    'image_id' => $request->input('product_image_id'),
                ]);
                break;
            case 1:
                $genre = new GenreRequest;
                $validator = Validator::make($request->all(), $genre->rules(), $genre->messages());
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                Genre::find($request->genre_id)->update([
                    'name' => $request->input('genre_name'),
                ]);
                break;
            case 2:
                $area = new AreaRequest;
                $validator = Validator::make($request->all(), $area->rules(), $area->messages());
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                Area::find($request->area_id)->update([
                    'name' => $request->input('area_name'),
                ]);
                break;
            case 3:
                $image = new ImageRequest;
                $validator = Validator::make($request->all(), $image->rules(), $image->messages());
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                Image::find($request->image_id)->update([
                    'url' => $request->input('image_url'),
                ]);
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
        }

        return back();
    }

    public function delete(Request $request)
    {
        $perPage = 8;
        $columns = ['*'];
        $pageName = 'managespage';

        switch ($request->tab_item) {
            case 0:
                Product::find($request->product_id)->delete();
                break;
            case 1:
                Genre::find($request->genre_id)->delete();
                break;
            case 2:
                Area::find($request->area_id)->delete();
                break;
            case 3:
                Image::find($request->image_id)->delete();
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
        }

        return back();
    }
}
