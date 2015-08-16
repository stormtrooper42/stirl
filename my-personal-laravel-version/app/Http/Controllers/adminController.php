<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
    private function controlUser(Request $request){
        if (Auth::check()) {
            $user = DB::table('users')->where('username', $request->session()->get('username'))->first();
            if($user->admin == 1){
                if($user->remember_token == $request->session()->get('token')){
                    return "ok";
                }else{
                    return "redirect";
                }
            }else{
                return "redirect";
            }
        }else
        {
            return "login";
        }
    }
    public function index(Request $request)
    {
        $categoriesMenu = DB::table('categories')->get();
        if($this->controlUser($request) == "ok"){
            return view('dashboard',['categoriesMenu'=>$categoriesMenu]);
        }else if($this->controlUser($request) == "redirect"){
            return redirect()->route('logout');
        }else if($this->controlUser($request) == "login"){
            return view('login',['categoriesMenu'=>$categoriesMenu]);
        }
    }

    public function indexArticleWrite(Request $request){
        $categoriesMenu = DB::table('categories')->get();
        if($this->controlUser($request) == "ok"){
            return view('admin/admin-article-write',['categoriesMenu'=>$categoriesMenu]);
        }else if($this->controlUser($request) == "redirect"){
            return redirect()->route('logout');
        }else if($this->controlUser($request) == "login"){
            return view('login',['categoriesMenu'=>$categoriesMenu]);
        }
    }

    public function deleteArticle(Request $request,$slug,$id){
        $categoriesMenu = DB::table('categories')->get();
        if($this->controlUser($request) == "ok"){
            DB::table('articles')->where('id', '=', $id)->delete();
            $request->session()->flash('success', 'L\'article '.$slug.'-'.$id.' a bien été supprimé !');
            return redirect('./');
        }else if($this->controlUser($request) == "redirect"){
            return redirect()->route('logout');
        }else if($this->controlUser($request) == "login"){
            return view('login',['categoriesMenu'=>$categoriesMenu]);
        }
    }

    public function postArticle(Request $request)
    {
        $categoriesMenu = DB::table('categories')->get();
        if($this->controlUser($request) == "ok"){
            $data = $request->all();
            $rules = array(
                'title' => 'required|min:7',
                'category' => 'required|min:7',
                'content' => 'required|min:7',
            );
            $validator = Validator::make($data, $rules);
            if($validator->fails())
            {
                $request->session()->flash('error', 'Tous les champs doivent contenir au moins 7 caractères !');
                return redirect()->action('adminController@indexArticleWrite')->withInput($request->except('password'));
            }else
            {
                $category = DB::table('categories')->where('name', $request->get('category'))->first();
                if($category == null)
                {
                    $idCategory = DB::table('categories')->insertGetId(
                        ['name' => $request->get('category')]
                    );
                }
                $idArticle = DB::table('articles')->insertGetId(
                    ['title' => $request->get('title'), 'category' => $request->get('category'), 'content' => $request->get('content'), 'dateOfWriting' => date("Y-m-d")]
                );
                $request->session()->flash('success', 'L\'article a bien été posté !');
                return redirect()->action('adminController@indexArticleWrite');
            }
        }else if($this->controlUser($request) == "redirect"){
            return redirect()->route('logout');
        }else if($this->controlUser($request) == "login"){
            return view('login',['categoriesMenu'=>$categoriesMenu]);
        }
    }

}
