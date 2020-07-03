@extends('layouts.profile')
@section('content')

    @empty($Bio)
        <div class="card">
            <div class="card-body">
                <h3> Profile not found</h3>
            </div>
        </div>
        @else
        <div class="up_profile_sidebar">
        
            <div class="profile_user">
                Luis Caballero
            </div>
        </div>
    
        <div class="info_profile">
            <div class="content_profile_row">
                <div class="last_post ContentProfile">
                    <h5>Último post</h5>
                 
                    <div class="user_last_post">
                        <div class="row">
                            <a href="/post/{{ $lastPost->slug }}">
                                <div class="col-8" style="margin:auto;">
                                    
                                        <div class="Post_last_profile">
                                            <div class="picture_profile_post">
                                                
                                                    <img src="{{ $AppBasePublic }}{{ $lastPost->Imagen }}" class="rounded img-post" width="100%" height="100%" alt="">
                                                
                                            </div>
                                            <div class="last_post_info">
                                                <div class="Title_picture">
                                                    <h4>{{ $lastPost->Title }}</h4>
                                                </div>
                                                <div class="Extract_picture">
                                                    <h6> {{ $lastPost->Extract }}</h6>
                                                </div>
                                            </div>
                                            
                                        </div>
                                </div>
                            </a>
                        </div>
                       
                    </div>
                </div>
                <div class="biography ContentProfile">
                    <h5>Biography</h5>
                    <p>{{ $Bio }}</p>
                  
                </div>
            </div>
           
        </div>
    @endempty
    

@endsection