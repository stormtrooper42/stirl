<?php namespace App\Http\Controllers;
use DB;
class ArticleController extends Controller{

    public function __contruct(){
        $this->middleware('guest');
    }

    public function index($slug,$id){
        $article = DB::table('articles')->where('id', $id)->first();
        $categoriesMenu = DB::table('categories')->get();
        return view('article', ['article' => $article,'categoriesMenu'=>$categoriesMenu]);
    }

}