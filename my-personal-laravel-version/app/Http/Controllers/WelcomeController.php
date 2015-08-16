<?php namespace App\Http\Controllers;
use DB;
class WelcomeController extends Controller{

    public function __contruct(){
        $this->middleware('guest');
    }

    public function index(){
        $articles = DB::table('articles')->orderBy('id', 'desc')->get();
        $categoriesMenu = DB::table('categories')->get();
        return view('welcome', ['articles' => $articles,'categoriesMenu'=>$categoriesMenu]);
    }

    public function getCategoryArticle($category){
        $articles = DB::table('articles')->where('category','=',$category)->orderBy('id', 'desc')->get();
        $categoriesMenu = DB::table('categories')->get();
        return view('welcome', ['articles' => $articles,'categoriesMenu'=>$categoriesMenu]);
    }

}