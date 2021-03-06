@extends('layouts.profile')
@section('content')
    <!-- profile-->

    <div class="row">
        <div class="col-sm-12 col-md-7 m-auto">
            <div class="UpInfo">
                <div class="Profile-Up">
                    <h4>Profile</h4>
                    <h6>Cuenta un poco sobre tí</h6>    
                </div>
            </div>
            <div class="DownInfo">
                <div id="UpDownTitle">
                    <div class="infoHead">
                        <h6>
                            Account Info
                        </h6>
                        <p><a href="/profile/{{ Auth::user()->id }}/show"><i class="far fa-id-badge"></i> View public profile </a></p>
                    </div>
                  
                </div>

                <div class="formProfile">
                <form method="POST" action="/profile/{{ Auth::user()->id }}">
                        @csrf
                        <div class="containerInputs">
                            <div class="ProfileInputBox">
                                <div>
                                    <label>
                                        Name
                                    </label>
                                </div>
                            @empty($Profile[0])
                                    <input class="ProfileInput" type="text" name="Name" placeholder="Name" value="">
                                @else
                                    <input class="ProfileInput" type="text" name="Name" placeholder="Name" value="{{ $Profile[0]->Full_Name}}">
                            @endempty    
                            
                            </div>
                            <div class="ProfileInputBox">
                                <div>
                                    <label>
                                        Email
                                    </label>
                                </div>
                               
                            <input class="ProfileInput" type="email" name="email" placeholder="Email" value="{{ $email }}">
                           
                            </div>
                        </div>
                       
                        <hr>
                        <div class="BioBox">
                            <label for="">
                                Biografia
                            </label>
                        @empty($Profile[0])
                             <textarea name="Bio" class="ProfileInput" id="Bio" rows="10"></textarea>
                            @else
                            <textarea name="Bio" class="ProfileInput" id="Bio" rows="10">{{ $Profile[0]->biography }}</textarea>
                        @endempty

                            
                        </div>

                        <input type="submit" id="save" name="save" class="btn btn-success" value="Guardar">
                        
                    </form>  

             
                </div>

               
               
            </div>
            
        </div>
    </div>

    @if( session()->has('profile') )
        <div class="">
            <p class="alert alert-success successProfile">{{ session('profile') }}</p>
        </div>
    @endif
@endsection