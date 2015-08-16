<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class aboutController extends Controller
{
 function index()
    {
        $categoriesMenu = DB::table('categories')->get();
        return view('about',['categoriesMenu' => $categoriesMenu]);
    }
}
