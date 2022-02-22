<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gif;
use Illuminate\Http\Request;

class GifsController extends Controller
{
    public function index()
    {
        $gifs = Gif::all();
        $categories = Category::all();
        return view('welcome',['gifs' => $gifs, 'categories' => $categories]);
    }

    public function upload()
    {
        $categories = Category::all();
        return view('upload',[ 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Gif::create($input);
        return redirect('/')->with('success', 'Gif Added!');
    }
}
