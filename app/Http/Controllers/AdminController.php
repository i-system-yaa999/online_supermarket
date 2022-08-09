<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ManagerRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Manager;
use App\Models\User;
use App\Models\Product;
use App\Models\Image;
use App\Models\Genre;
use App\Models\Area;
use App\Models\Delivery;
use App\Models\Like;
use App\Models\Comment;
use Illuminate\Validation\Rule;

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
    // public function create(Request $request)
    // {

    //     switch ($request->tab_item) {

    //         case 0:
    //             // 売り場担当者 情報 新規作成
    //             $manager_request = new ManagerRequest;
    //             $validator = Validator::make($request->all(), $manager_request->rules(), $manager_request->messages());
    //             if ($validator->fails()) {
    //                 return back()->withErrors($validator)->withInput();
    //             }
    //             // $manager = Manager::create([
    //             //     'user_id' => $request->user_id,
    //             //     'genre_id' => $request->genre_id,
    //             // ]);
    //             // $user = User::where('id', $request->user_id)->update([// User::find()->update()だと書き変わらない
    //             //     'role' => 5,
    //             // ]);
    //             break;

    //         case 1:
    //             // ユーザー 情報 新規作成
    //             $user_request = new UserRequest;
    //             $validator = Validator::make($request->all(), $user_request->rules(), $user_request->messages());
    //             if ($validator->fails()) {
    //                 return back()->withErrors($validator)->withInput();
    //             }
    //             // $user = User::create([
    //             //     'name' => '',
    //             //     'email' => '',
    //             //     'password' => '',
    //             // ]);
    //             break;

    //         default :
    //             break;
    //     }
    //     return back();
    // }
    // public function update(Request $request)
    // {
        
    //     switch ($request->tab_item) {

    //         case 0:
    //             // 売り場担当者 情報 変更
    //             $manager_request = new ManagerRequest;
    //             $validator = Validator::make($request->all(), [$manager_request->rules(), Rule::unique('managers')->ignore($request->manager_id)], $manager_request->messages());
    //             if ($validator->fails()) {
    //                 return back()->withErrors($validator)->withInput();
    //             }
    //             // $manager = Manager::find($request->manager_id)->update([
    //             //     'genre_id' => $request->genre_id,
    //             // ]);
    //             break;

    //         case 1:
    //             // ユーザー 情報 変更
    //             $user_request = new UserRequest;
    //             $validator = Validator::make($request->all(), $user_request->rules(), $user_request->messages());
    //             if ($validator->fails()) {
    //                 return back()->withErrors($validator)->withInput();
    //             }
    //             // $user = User::where('id', $request->user_id)->first();
    //             // if (Hash::check($request->user_password, $user->password)) {
    //             //     User::where('id', $request->user_id)->update([
    //             //         'name' => $request->user_name,
    //             //         'email' => $request->user_email,
    //             //     ]);
    //             // } else {
    //             //     User::where('id', $request->user_id)->update([
    //             //         'name' => $request->user_name,
    //             //         'email' => $request->user_email,
    //             //         'password' => Hash::make($request->user_password),
    //             //     ]);
    //             // }
    //             break;

    //         default:
    //             break;
    //     }
    //     return back();
    // }
    // public function delete(Request $request)
    // {
    //     switch ($request->tab_item) {

    //         case 0:
    //             // 売り場担当者 情報 削除
    //             // $manager = Manager::find($request->manager_id)->delete();
    //             // $user = User::where('id', $request->user_id)->update([ // User::find()->update()だと書き変わらない
    //             //         'role' => 10,
    //             //     ]);
    //             break;

    //         case 1:
    //             // ユーザー 情報 削除
    //             // $user = User::where('id', $request->user_id)->delete();
    //             break;

    //         default:
    //             break;
    //     }
    //     return back();
    // }
}
