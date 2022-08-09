<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Area;
use App\Models\Comment;
use App\Models\Cart;
use App\Models\Like;
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

    public function index(Request $request)
    {
        $product = Product::all();
        return back();
    }
    public function create(ProductRequest $request)
    {
        $product = Product::create([
            'name' => $request->product_name,
            'area_id' => $request->product_area_id,
            'genre_id' => $request->product_genre_id,
            'price' => $request->product_price,
            'description' => $request->product_description,
            'image_id' => $request->product_image_id,
        ]);
        return back();
    }
    public function update(ProductRequest $request)
    {
        $product = Product::find($request->product_id)->update([
            'name' => $request->product_name,
            'area_id' => $request->product_area_id,
            'genre_id' => $request->product_genre_id,
            'price' => $request->product_price,
            'description' => $request->product_description,
            'image_id' => $request->product_image_id,
        ]);
        // return redirect(route('manage.index'));
        return back();
    }
    public function delete(Request $request)
    {
        $product = Product::find($request->product_id)->delete();
        Cart::where('product_id', $request->product_id)->delete();
        Like::where('product_id', $request->product_id)->delete();
        Comment::where('product_id', $request->product_id)->delete();
        return back();
    }
}
