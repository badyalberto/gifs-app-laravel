<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gif;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function filter(){
        $categories = Category::all();
        if(isset($_GET['category'])){
            if($_GET['category'] == 1){

                $gifs = Gif::all();
                return redirect('/');
            }

            $gifs = Gif::where('category_id',$_GET['category'])->get();
            return view('category-gifs',['categories' => $categories,'gifs' => $gifs]);
        }

        return redirect('/');

    }
}
