<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Area;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{

    public function productList(Request $request)
    {
        $perPage = 8;
        $columns = ['*'];
        $pageName = 'productspage';

        switch($request->tab_item){
            case 0:
                $products = Product::where('name', '!=', '')->orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 1:
                $products = Product::where('area_id', $request->input('selected_area'))->orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 2:
                if (!($request->input('search_name') == '')) {
                    $products = Product::where('name', 'LIKE', '%' . $request->input('search_name') . '%')->Paginate($perPage, $columns, $pageName);
                } else {
                    $products = Product::where('name', '!=', '')->orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                }
                break;
            default:
                $products = Product::where('genre_id', ($request->tab_item - 2))->orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            // case 4:
            //     $products = Product::where('genre_id', '2')->orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
            //     break;
            // case 5:
            //     $products = Product::where('genre_id', '3')->orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
            //     break;
            // case 6:
            //     $products = Product::where('genre_id', '4')->orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
            //     break;
        }
        return view('index')->with([
            'tab_item' => $request->tab_item,
            'products' => $products,
            'areas' =>  Area::all(),
            'selected_area' => $request->input('selected_area'),
            // 'selected_genre' => $request->input('selected_genre'),
            'search_name' => $request->input('search_name'),
        ]);
    }
}
