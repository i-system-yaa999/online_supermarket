<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Genre;
use App\Models\Area;
// use App\Models\Image;

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
                $products = Product::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 1:
                $genres = Genre::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 2:
                $areas = Area::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 3:
                // $images = Image::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
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
            // 'allimages' =>  Image::all(),
        ]);
    }
}
