<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Image;

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
                break;
            case 1:
                break;
            case 2:
                break;
            case 3:
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
        ]);
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
                Product::where('id', $request->product_id)->update([
                    'name' => $request->input('product_name'),
                    'area_id' => $request->input('product_area_id'),
                    'genre_id' => $request->input('product_genre_id'),
                    'price' => $request->input('product_price'),
                    'description' => $request->input('product_description'),
                    'image_id' => $request->input('product_image_id'),
                ]);
                break;
            case 1:
                break;
            case 2:
                break;
            case 3:
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
        ]);
    }

    public function delete(Request $request)
    {
        $perPage = 8;
        $columns = ['*'];
        $pageName = 'managespage';

        switch ($request->tab_item) {
            case 0:
                break;
            case 1:
                break;
            case 2:
                break;
            case 3:
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
        ]);
    }
}
