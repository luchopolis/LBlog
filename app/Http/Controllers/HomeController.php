<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $UsuarioPosts = User::find(Auth::user()->id);
        //echo json_encode($UsuarioPosts->posts);
        $data = [
            "myPosts" => $UsuarioPosts->posts,
            "AppBasePublic" => Config::get('constans.AppBasePublic'),
        ];


        return view('home',$data);
    }
}
