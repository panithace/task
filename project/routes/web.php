<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return \App\Models\user::factory()->has(\App\Models\Birthh::factory())->make();
    // return \App\Models\User::fac tory()->changename('panithace')->make();
});
//Route::get('/', function(){
//    birth:Birthh::orderBy('id', 'desc')->get();
//    return view ('index');
//});
//Route::get('/', function(){
//    factory(Birthh::class, 10)->create();
//});
//Route::get('/', function () {
//    $birth = Birthh::all();
//    dd($birth);
//    return view ('index');
//});

//Route::get('/about', function() {
//        return view ('about');
//});
 
//Route::get('/DB', function() {
//$birth= DB::table('birth')->get();
//$birth = Birthh::all();
//dd($birth);
//return view ('index');
//});
//Route::get('/DB', function() {
 //   $users= DB::table('users')->orderBy('id')->get();
//    dd($users);
//    return view ('index');
//    });
//Route::get('/post/{p}/{id}', function ($p,$id) {
//    return $p.'-'. $id;
//});

//Route::get('/', function () {
//    $title = 'Pa';
//
//    return view ('index', [
//        'title' => $title
//    ]);
//});

//Route::get('/post/{id}', function ($id) {
//    return "post num". $id;
//});
//Route::get('/post/admin/example', array('as'=>'admin.home' , function () {
//    $url = route ('admin.home');
//    return "this url is". $url;
//}));

//route::get('/post' , '\App\Http\Controllers\PostController@index');

//use App\Http\Controllers\PostController;
//route::resource ('post', 'PostController');