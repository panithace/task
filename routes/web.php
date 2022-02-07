<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Models\Article;


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
  $articles=Article::orderBy('id')->get();
    return view ('index');
});

Route::get('/about', function() {
  return view ('about');
});


 
Route::prefix('admin')->group(function() {
  Route::get('/article' , function() {
    return view ('admin.article.index' , [
      'article' => Article::all()
    ]);
  });
    Route::get('/article/create', function() {
         return view('admin.article.create');
    });
Route::post('/article/create',function() {
  $validate_data = Validator::make(request()->all() , [
    'title' => 'required|min:10|max:50',
    'body' => 'required'
])->validated();
      Article::create([
      'title' => $validate_data['title'],
      'slug' => $validate_data['title'],
      'body' => $validate_data['body'],
      ]);

return redirect('/admin/article/create');
});  

 Route::get('/article/{id}/edit' , function($id) {
       $article = Article::findOrFail($id);

       return view('admin.article.edit' , [
           'article' => $article
       ]);
    });    
    Route::put('/article/{id}/edit' , function($id) {
      $validate_data = Validator::make(request()->all() , [
          'title' => 'required|min:10|max:50',
          'body' => 'required'
      ])->validated();
 
      $article = Article::findOrFail($id);

      $article->update($validate_data);

      return back();
  });
  Route::delete('/article/{id}' , function($id) {
    $article = Article::findOrFail($id);

    $article->delete();

    return back();
});
  });