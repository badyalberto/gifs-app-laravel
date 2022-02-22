<?php

namespace App\Http\Controllers;

use App\Models\Gif;
use Illuminate\Http\Request;

class GifsController extends Controller
{
    public function index()
    {
        $gifs = Gif::all();
        return view('welcome',['gifs' => $gifs]);
    }

    public function upload()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Gif::create($input);
        return redirect('/')->with('flash_message', 'Gif Addedd!');
    }
}
