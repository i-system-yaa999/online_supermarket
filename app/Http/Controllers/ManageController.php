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

    public function create(ProductRequest $request)
    {
        // $genre = new GenreRequest;
        // $validator = Validator::make($request->all(), $genre->rules(), $genre->messages());
        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }
        // $area = new AreaRequest;
        // $validator = Validator::make($request->all(), $area->rules(), $area->messages());
        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }
        // $image = new ImageRequest;
        // $validator = Validator::make($request->all(), $image->rules(), $image->messages());
        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }
        // $product = new ProductRequest;
        // $validator = Validator::make($request->all(), $product->rules(), $product->messages());
        // if ($validator->fails()) {
        //     return back()->withErrors($validator)->withInput();
        // }

        // if (Genre::where('name', $request->genre_name)->first()) {
        // } else {
        //     Genre::create([
        //         'name' => $request->genre_name,
        //     ]);
        // }
        // if (Area::where('name', $request->area_name)->first()) {
        // } else {
        //     Area::create([
        //         'name' => $request->area_name,
        //     ]);
        // }
        // if (Image::where('url', $request->image_url)->first()) {
        // } else {
        //     Image::create([
        //         'url' => $request->image_url,
        //     ]);
        // }

        // $genre_id = Genre::where('genre_name', $request->genre_name)->first()->id;
        // $area_id = Area::where('area_name', $request->area_name)->first()->id;
        // $image_id = Image::where('image_url', $request->image_url)->first()->id;
        Product::create([
            'name' => $request->product_name,
            'area_id' => $request->product_area_id,
            'genre_id' => $request->product_genre_id,
            'price' => $request->product_price,
            'description' => $request->product_description,
            'image_id' => $request->product_image_id,
        ]);

        return redirect(route('manage.index'));
        // return redirect('/manage');
        // return back();
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
                    'name' => $request->product_name,
                    'area_id' => $request->product_area_id,
                    'genre_id' => $request->product_genre_id,
                    'price' => $request->product_price,
                    'description' => $request->product_description,
                    'image_id' => $request->product_image_id,
                ]);
                break;
            case 1:
                $genre = new GenreRequest;
                $validator = Validator::make($request->all(), $genre->rules(), $genre->messages());
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                Genre::find($request->genre_id)->update([
                    'name' => $request->genre_name,
                ]);
                break;
            case 2:
                $area = new AreaRequest;
                $validator = Validator::make($request->all(), $area->rules(), $area->messages());
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                Area::find($request->area_id)->update([
                    'name' => $request->area_name,
                ]);
                break;
            case 3:
                $image = new ImageRequest;
                $validator = Validator::make($request->all(), $image->rules(), $image->messages());
                if ($validator->fails()) {
                    return back()->withErrors($validator)->withInput();
                }
                Image::find($request->image_id)->update([
                    'url' => $request->image_url,
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
