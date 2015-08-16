<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Hash;
use DB;
class loginController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }else{
            $categoriesMenu = DB::table('categories')->get();
            return view('login',['categoriesMenu'=>$categoriesMenu]);
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        $request->session()->flash('success', 'Vous avez bien été déconnecté !');
        return redirect('./');
    }

    public function login(Request $request)
    {
        $data = $request->all();
        $rules = array(
            'username' => 'required|min:6',
            'password' => 'required|min:6',
        );
        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $request->session()->flash('error', 'Tous les champs doivent être remplis !');
            return redirect()->action('loginController@index')->withInput($request->except('password'));
        }else
        {
            $userdata = array(
                'username' => $request->get('username'),
                'password' => $request->get('password'),
            );
            if(Auth::validate($userdata))
            {
                if(Auth::attempt($userdata))
                {
                    $token = md5(uniqid());
                    DB::table('users')
                        ->where('username', $request->get('username'))
                        ->update(['remember_token' => $token]);
                    $request->session()->put('username',$request->get('username'));
                    $request->session()->put('token',$token);
                    return redirect()->intended('dashboard');
                }
            }
            else
            {
                $request->session()->flash('error', 'Il y a eu un problème !');
                return redirect('login');
            }
        }
    }
}
