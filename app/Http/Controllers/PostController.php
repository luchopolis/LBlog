<?php

namespace App\Http\Controllers;

use App\category;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\FileAdmin;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Categories = category::all();
        //$Posts = post::all();
        $Posts = post::simplePaginate(3);
        $data = [
            "Categories" => $Categories,
            "Posts" => $Posts,
            "AppBasePublic" => Config::get('constans.AppBasePublic'),

        ];


        return view('posts.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Contenido Personalizado
        $this->middleware('Auth');
       return view('posts.create',[
           "Categories" => category::all()
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $userId)
    {
        $this->Image = null;


        //Almacena en Storage/example el Image es el name del input
        //echo $request->Image->store('example');
        //$request->Image->store(Config::get('constans.StorageBasePublic').'/laravel');
        //echo $this->Image = basename($request->file('Image')->getClientOriginalName());
        //$request->Image->store('example','outLaravel');

        $name = $request->Image->getClientOriginalName();

        if($request->hasFile('Image')){
            if(Storage::disk('outLaravel')->exists($name)){
                Storage::disk('outLaravel')->delete($name);
                $request->Image->storeAs('',$name,'outLaravel');
                $this->Image = $name;
                //return redirect('home');
            }else{
                        //Carpeta ---- NombreArch ---- Disk
                if($request->Image->storeAs('',$name,'outLaravel')){
                    $this->Image = $name;
                }else{
                    $this->Image = "Default.jpg";
                }
            }
        }else{
            //return redirect('home');
        }
        //dd(Storage::disk('outLaravel')->exists($name));
        $NewPost = new post();
        $NewPost->Title = $request->input('title');
        $NewPost->Extract = $request->input('extract');
        $NewPost->Content = $request->input('content');
        $NewPost->Imagen = $name;
        $NewPost->user_id = $userId;
        $NewPost->category_id = $request->input('category');
        $NewPost->save();

        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        $Publicacion = post::find($post->id);
        $Categories = category::all();
        $data = [
            "Categories" => $Categories,
            "Post" => $Publicacion,
            "AppBasePublic" => Config::get('constans.AppBasePublic')
        ];

        return view('posts.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->middleware('Auth');

        $post = post::find($id);

        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->middleware('Auth');
        $post = post::find($id);
        if(Storage::disk('outLaravel')->exists($post->Imagen)){
            Storage::disk('outLaravel')->delete($post->Imagen);
            post::find($id)->delete();
        }

        return redirect('home');
    }

    public function savePost(Request $request){

        $imgpath = $request->file('file')->store('post', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);

    }
}
