<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\profile;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $profile = profile::where('user_id','=', $user->id)->get();

    
        $data = [
            "Profile" => $profile,
            "email" => $user->email
        ];
        return view('Profile.index',$data);
        //echo json_encode([$profile, "email" => $user->email]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {

        $profile = profile::where('user_id','=', $user->id)->get();
        
        if($profile == null ){
            profile::create([
                "user_id" => $user->id,
                "Full_name" => $request->input('Name'),
                "avatar" => "default.png",
                "biography" => $request->input('Bio')
            ]);

        }else{
            profile::where('user_id',$user->id)
                    ->update([
                        "Full_name" => $request->input('Name'),
                        "avatar" => "default.png",
                        "biography" => $request->input('Bio')
                    ]);
                    
            User::where('id',$user->id)
                ->update(["email" => $request->input('email')]);
        }

        return back()->with('profile','Cambios realizados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('Profile.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
