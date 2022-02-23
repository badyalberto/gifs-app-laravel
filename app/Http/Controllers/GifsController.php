<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $inputs = $request->all();

        //dd($request->hasFile('file'));

        if($request->hasFile('file')){
            $destination_path = 'uploads';
            $gif = $request->file('file');
            $gif_name = time().$gif->getClientOriginalName();
            $path = $request->file('file')->move($destination_path,$gif_name);
            $inputs['file'] = $gif_name;
            //Storage::disk('local')->put($inputs['file'], 'Contents');
        }

        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

        $request->validate([
            'url' => 'regex:'.$regex,
        ]);

        Gif::create($inputs);
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
