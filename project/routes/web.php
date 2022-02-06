<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Models\Birthh;


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

//Route::get('/', function(){
  //  return \App\Models\Birthh::factory()->has(\App\Models\Birthh::factory())->make();
    // return \App\Models\User::fac tory()->changename('panithace')->make();
//});
//Route::get('/', function(){
//    birth:Birthh::orderBy('id', 'desc')->get();
//    return view ('index');
//});
//Route::get('/', function(){
//    factory(Birthh::class, 10)->create();
//});
Route::get('/', function () {
//    $birth = Birthh::all();
//    dd($birth);
   return view ('index');
});

Route::get('/about', function() {
        return view ('about');
});
//Route::get('/admin/article/create', function() {
//    return view ('create');
//});
 
Route::prefix('admin')->group(function() {
    Route::get('/article/create', function() {
    // if($_GET) {
      //      dd($_GET);
     //   }
         //dd('test');
         return view('admin.article.create');
    });
    //Route::get('/article/create',function(){
        
   

Route::post('/article/create',function() {
    $validate_data = Validator::make(request()->all() , [
        'title' => 'required|min:5|max:10'
    //$validator = Validator::make(request()->all() , [
       // 'username' => 'required|min:2|max:10',
    //])->validate();
   // ],[
        //'title.required'=>'field'
    ])->validated();
      //  dd($validate_data);
       
      // if($validator->fails()) {
        //return redirect()
             //   ->back()
               // ->withErrors($validator);
    //}
            Birthh::create([
            'username' => $validate_data['title'],
            ]);
        
            return redirect('admin/article/create');
            //$article->username = request('title');
            //dd(request()->all()); 
            //dd($_POST);
           // dd('test'); 
           //dd(request('title'));
        
    //Route::get('/article/{id}/edit' , function($id) {
    //    $birth=Birthh::find($id);
     //   return view('admin.article.edit' , [
     //       'birth'=>$birth
     //   ]);

      // $article = new Birthh();
       //$article->username = request('title');
       //$article->save();
    }); 

       Route::get('admin/article/{id}/edit' , function($id){
       //     $validate_data = Validator::make(request()->all() , [
         //       'username' => 'required|min:2|max:10'
           // ])->validated();
              $article = Birthh::find($id);
           // $birth->update([
            //'username'=>$validate_data['title'],
           // ]);

            //return back();
            //$birth = birth::find($id);
            //if(is_null($birth)){
            //    abort(404);
            //}
           return view('admin.article.edit' , [
               'article' => $article
           ]);
            // return $article;
        });
   // });
   Route::post('/admin/article/{id}/edit' , function($id){
    $validate_data = Validator::make(request()->all() , [
        'title' => 'required|min:5|max:10'
        ])->validated();
        
        $article = Birthh::find($id);
        return $article->title;
    }); 
});



    

   // $article = new Birthh();
    //$article->username = request('username');
    //$article->save();




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
//    $title = 'Pan';
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