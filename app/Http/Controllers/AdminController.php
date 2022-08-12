<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;
use App\Models\User;
use App\Models\Product;
use App\Models\Image;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Delivery;
use App\Models\Like;
use App\Models\Comment;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 8;
        $columns = ['*'];
        $pageName = 'adminpage';

        $managers = null;
        $users = null;
        $products = null;
        $images = null;
        $genres = null;
        $areas = null;
        $deliveries = null;
        $likes = null;
        $comments = null;
        switch ($request->tab_item) {
            case 0:
                $managers = Manager::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 1:
                $users = User::where('role', 10)->orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 2:
                $products = Product::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 3:
                $images = Image::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 4:
                $genres = Genre::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 5:
                $areas = Area::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 6:
                $deliveries = Delivery::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 7:
                $likes = Like::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
            case 8:
                $comments = Comment::orderBy('id', 'desc')->Paginate($perPage, $columns, $pageName);
                break;
        }

        return view('admin')->with([
            'tab_item' => $request->tab_item,
            'managers' => $managers,
            'users' => $users,
            'products' => $products,
            'genres' => $genres,
            'areas' => $areas,
            'images' => $images,
            'deliveries' => $deliveries,
            'likes' => $likes,
            'comments' => $comments,
            'allgenres' =>  Genre::all(),
            'allareas' =>  Area::all(),
            'allimages' =>  Image::all(),
            'allusers' =>  User::all(),
            'allproducts' =>  Product::all(),
        ]);
    }
}
