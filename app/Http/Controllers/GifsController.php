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
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

        $request->validate([
            'url' => 'required|regex:'.$regex,
        ]);

        Gif::create($input);
        return redirect('/')->with('success', 'Gif Added!');
    }

    public function search(){
        $categories = Category::all();
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $gifs = Gif::query()->where('name','like',"%{$search}%")->get();
            return view('welcome',['categories' => $categories,'gifs' => $gifs]);
        }

        return redirect('/');
    }
}
