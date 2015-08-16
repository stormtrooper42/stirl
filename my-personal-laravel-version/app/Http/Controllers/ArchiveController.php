<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $years = DB::table('articles')->select( DB::raw('DISTINCT YEAR(dateOfWriting) AS date_year') )->get();
        $categoriesMenu = DB::table('categories')->get();
        return view('archive', ['years' => $years,'categoriesMenu'=>$categoriesMenu]);
    }

   public function getArchive($year){
       $articles = DB::table('articles')->where(DB::raw('Year(dateOfWriting)'),'=',$year)->get();
       $categoriesMenu = DB::table('categories')->get();
       return view('archive_filter', ['articles' => $articles,'year' => $year,'categoriesMenu'=>$categoriesMenu]);
   }

}
