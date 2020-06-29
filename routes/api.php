<?php

use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/posts',function(){
    return response()->json(post::all());
});

Route::post('/posts',function(Request $request){

    $post = new post();
    $post->user_id = $request->input('userid');
    $post->category_id = $request->input('categoryid');
    $post->Title = $request->input('title');
    $post->Extract = $request->input('extract');
    $post->Content = $request->input('content');
    $post->Imagen = $request->input('imagen');
    $post->slug = $request->input('slug');
    $post->save();

    return response()->json(post::all(),200);
});

Route::get('/post/{slug}',function($slug){
    $post = post::where('slug','=',$slug)->get();

    return response()->json($post);
});

Route::put('/post/{id}',function($id,Request $request){

    $post = post::find($id);
    $post->Title = $request->input('title');
    $post->save();

    return response()->json($post);
});