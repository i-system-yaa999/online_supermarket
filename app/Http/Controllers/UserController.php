<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::all();
        return back();
    }
    public function create(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->user_name,
            'email' => $request->user_email,
            'password' => Hash::make($request->user_password),
        ]);
        return back();
    }
    public function update(UserRequest $request)
    {
        $user = User::where('id', $request->user_id)->first();
        if (Hash::check($request->user_password, $user->password)) {
            User::where('id', $request->user_id)->update([
                'name' => $request->user_name,
                'email' => $request->user_email,
            ]);
        } else {
            User::where('id', $request->user_id)->update([
                'name' => $request->user_name,
                'email' => $request->user_email,
                'password' => Hash::make($request->user_password),
            ]);
        }
        return back();
    }
    public function delete(Request $request)
    {
        // $user = User::find($request->user_id)->delete();
        $user = User::where('id', $request->user_id)->delete();
        return back();
    }
}
