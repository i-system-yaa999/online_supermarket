<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\GenreRequest;
use App\Models\Genre;

class GenreController extends Controller
{
    public function index(Request $request)
    {
        $genre = Genre::all();
        return back();
    }
    public function create(GenreRequest $request)
    {
        $genre = Genre::create([
            'name' => $request->genre_name,
        ]);
        return back()->withinput([
            'product_genre_id' => $genre->id,
        ]);
    }
    public function update(GenreRequest $request)
    {
        $genre = Genre::find($request->genre_id)->update([
            'name' => $request->genre_name,
        ]);
        return back();
    }
    public function delete(Request $request)
    {
        $genre = Genre::find($request->genre_id)->delete();
        return back();
    }
}
