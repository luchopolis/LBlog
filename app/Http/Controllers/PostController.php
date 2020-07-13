<?php

namespace App\Http\Controllers;

use App\category;
use App\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\FileAdmin;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

use App\Http\Requests\post as postRequest;
class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show','index']);
    }
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
    public function store(postRequest $request, $userId)
    {
        $this->Image = null;

        //Almacena en Storage/example el Image es el name del input
        //echo $request->Image->store('example');
        //$request->Image->store(Config::get('constans.StorageBasePublic').'/laravel');
        //echo $this->Image = basename($request->file('Image')->getClientOriginalName());
        //$request->Image->store('example','outLaravel');


        /*
        $this->validate($request,[
            "title" => "required",
            "extract" => "required",
            "content" => "required",
            "category" => "required"
        ]);
        */

        //Utilizando un request para validar
        $request->validated();

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


            /*
                HEROKU CODIGO INTENTO
            $request->Image->storeAs('postImages',$name);
            if(Storage::disk('public')->exists($name)){
                Storage::disk('public')->delete($name);
                $request->Image->storeAs('postImages',$name);
                $this->Image = $name;
            }else {
                if($request->Image->storeAs('postImages',$name)){
                    $this->Image = $name;
                }else{
                    $this->Image = "Default.jpg";
                }
            }*/

        }else{
            return redirect('home');
        }
        //dd(Storage::disk('outLaravel')->exists($name));
        $NewPost = new post();
        $NewPost->Title = $request->input('title');
        $NewPost->Extract = $request->input('extract');
        $NewPost->Content = $request->input('content');
        $NewPost->Imagen = $name;
        $NewPost->user_id = $userId;
        $NewPost->category_id = $request->input('category');
        $NewPost->slug = Str::slug($request->input('title','-'));
        $NewPost->save();

        //Enviar una respuesta con redirect, forma parte de un response
        return redirect('home')->with('newPost',asset('storage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //$Publicacion = post::find($post->id);
        $Publicacion = post::where('slug','=',$slug)->get();
        $Categories = category::all();
        $Comments = DB::table('comments')->get()->where('post_id','=',$Publicacion[0]->id);
        $data = [
            "Categories" => $Categories,
            "Post" => $Publicacion,
            "Comments" => $Comments,
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
     
        
        $post = post::find($id);
        $Categories = category::all();

        $data = [
            "post" => $post,
            "Categories" => $Categories
        ];

        return view('posts.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $lastImage = post::find($id);

        //echo $lastImage->Imagen;
        $name = "";

        if($request->hasFile('Image')){
            $name = $request->Image->getClientOriginalName();
            if(Storage::disk('outLaravel')->exists($name)){
                Storage::disk('outLaravel')->delete($name);
                $request->Image->storeAs('',$name,'outLaravel');
                $this->Image = $name;
            }else{
                if($request->Image->storeAs('',$name,'outLaravel')){
                    $this->Image = $name;
                }else{
                    $this->Image = $lastImage->Imagen;
                }
            }

            /*
                    HEROKU CODIGO
            if(Storage::disk('public')->exists($name)){
                Storage::disk('public')->delete($name);
                $request->Image->storeAs('postImages',$name,'puexistsblic');
                $this->Image = $name;
            }else {
                if($request->Image->storeAs('postImages',$name,'public')){
                    $this->Image = $name;
                }else{
                    $this->Image = "Default.jpg";
                }
            }*/
        }else{
            $this->Image = $lastImage->Imagen;  
        }

        $NewPost = post::find($id);
        $NewPost->Title = $request->input('Title');
        $NewPost->Extract = $request->input('Extract');
        $NewPost->Content = $request->input('content');
        $NewPost->Imagen = $this->Image;
        $NewPost->category_id = $request->input('category');
        $NewPost->slug = Str::slug($request->input('title','-'));
        $NewPost->save();

        return redirect('home');

        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     

        $post = post::find($id);
        
        if(Storage::disk('outLaravel')->exists($post->Imagen)){
            Storage::disk('outLaravel')->delete($post->Imagen);
            $post->delete();
        }
        $post->delete();

        return redirect('home');
    }

    public function savePost(Request $request){

        $imgpath = $request->file('file')->store('post', 'public');
        return response()->json(['location' => "/storage/$imgpath"]);

    }
}
