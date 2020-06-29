<?php

use App\profile;
use App\User;
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

Route::get('/','HomeController@index');

// |---- Home -----|

Route::get('/home', 'HomeController@index')->name('home');


//****************** Resources **************************
//--- Category --
Route::resource('/categories','CategoryController');
//-- Post --
Route::resource('/post','PostController');
//|--- Preview ---
Route::resource('/preview','PreviewController');

// |--------------- END RESOURCES -------------- ||

// *********** GET ***********
// |----- Category ---- |
Route::get('/categories','CategoryController@index');
// |----- Posts -------|
Route::get('/posts', 'PostController@index');
Route::get('/post/{id}/confirmDelete','PostController@destroy');

//Route::get('/post/{slug}','PostController@show');

// |----------- END GET ------------- |


// *********** POST **********
// |-------- posts ----------|
Route::post('/post/{useId}/create','PostController@store');
Route::post('/post/saveImage','PostController@savePost');


// ***** COMMENTS *******
Route::post('/comment/{post_id}/create','CommentController@store');

//|---------- END POST ---------|

Route::post('/post/{postId}/update','PostController@update');

/********** !! PROFILE !!*************** */

Route::get('/profile/{user}','profileController@index');

Auth::routes();



//Route::post('/preview/post','PreviewController@previewPost');

//Route::post('/prueba','TinyMceController@store');

//Route::post('/post/image/upload', 'TinyMceController@uploadImage')->name('post.image.upload');
