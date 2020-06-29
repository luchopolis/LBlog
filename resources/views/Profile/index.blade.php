@extends('layouts.app')
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
                    <h6>
                        Account Info
                    </h6>
                </div>

                <div class="formProfile">
                    <form>
                        <div class="ProfileInputBox">
                            <div>
                                <label>
                                    Name
                                </label>
                            </div>
                            
                        <input class="ProfileInput" type="text" name="Name" placeholder="Name" value="{{ $Profile[0]->Full_Name }}">
                        </div>
                        <div class="ProfileInputBox">
                            <div>
                                <label>
                                    Email
                                </label>
                            </div>
                           
                        <input class="ProfileInput" type="email" name="email" placeholder="Email" value="{{ $email }}">
                        </div>
                    </form>  

                   
                </div>
               
            </div>
            
        </div>
    </div>
@endsection