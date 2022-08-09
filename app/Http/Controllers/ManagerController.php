<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ManagerRequest;
use App\Models\Manager;
use App\Models\User;

class ManagerController extends Controller
{
    public function index(Request $request)
    {
        $manager = Manager::all();
        return back();
    }
    public function create(ManagerRequest $request)
    {
        $manager = Manager::create([
            'user_id' => $request->user_id,
            'genre_id' => $request->genre_id,
        ]);
        $user = User::where('id', $request->user_id)->update([ // User::find()->update()だと書き変わらない
            'role' => 5,
        ]);
        return back();
    }
    public function update(Request $request)
    {
        $manager = Manager::find($request->manager_id)->update([
            'genre_id' => $request->genre_id,
        ]);
        return back();
    }
    public function delete(Request $request)
    {
        $manager = Manager::find($request->manager_id)->delete();
        $user = User::where('id', $request->user_id)->update([ // User::find()->update()だと書き変わらない
            'role' => 10,
        ]);
        return back();
    }
}
