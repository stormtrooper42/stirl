<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/* Error routes */

Route::get('404/{page}', ['as'=>'404',function($page){
    return view('errors/404')->with("page",$page);
}]);

Route::get('401', ['as'=>'401', function(){
    return view("errors/401");
}]);

/**/

/*Controller routes*/

Route::get('/', ['as' => 'root', 'uses' => 'WelcomeController@index']);
Route::get('category-{category}', ['as' => 'root', 'uses' => 'WelcomeController@getCategoryArticle'])->where('category','[A-Za-zÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\-]+');
Route::get('about', ['as' => 'about', 'uses' => 'aboutController@index']);
Route::get('login', ['middleware'=>'Ip','as' => 'login', 'uses' => 'loginController@index']);
Route::post('postLogin', ['as' => 'postLogin', 'uses' => 'loginController@login']);
Route::get('article-{slug}-{id}', ['as'=> 'article', 'uses' => 'ArticleController@index'])->where('slug', '[a-z0-9\-]+')->where('id', '[0-9]+');
Route::get('archive', ['as'=> 'archive', 'uses' => 'ArchiveController@index']);
Route::get('archive-{year}', ['as'=> 'archiveyear', 'uses' => 'ArchiveController@getArchive'])->where('year', '[0-9]+');
Route::get('logout',['as' => 'logout', 'uses' => 'loginController@logout']);
Route::get('dashboard',['middleware'=>'Ip','as' => 'dashboard', 'uses' => 'adminController@index']);
Route::get('admin-article-write', ['middleware'=>'Ip','as' => 'writeArticle', 'uses' => 'adminController@indexArticleWrite']);
Route::post('admin-article-post', ['middleware'=>'Ip','as' => 'postArticle', 'uses' => 'adminController@postArticle']);
Route::get('delete-article-{slug}-{id}', ['middleware'=>'Ip','as'=> 'DeleteArticle', 'uses' => 'adminController@deleteArticle'])->where('slug', '[a-z0-9\-]+')->where('id', '[0-9]+');
//Route::controller('welcome','WelcomeController');

/**/