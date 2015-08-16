<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class categoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();
    }
}
