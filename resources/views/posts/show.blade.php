@extends('layouts.base')

@section('content')
  
        <div class="row">
            <div class="col-sm-12 col-md-8 h-100">
                <div class="mb-4 mt-4">


                    <h2 class="card-title">{{ $Post->Title }}</h2>
                    <div class="text-muted">
                        by {!! '<span class="text-danger">' !!} {{ $Post->user["UserName"] }} {!! '</span>' !!} On {{ $Post->created_at->format('d/m/Y') }}
                    </div>
                    <!-- Ruta imagen defecto http://placehold.it/750x300-->
                

                    <div class="card-body">
                        
                        <textarea style="width: 100%;height:1024px" name="content" id="tiny-body" cols="30"
                                        rows="10">{{ $Post->Content}}</textarea>
    
                    </div>
                
                </div>
            </div>

   
@endsection
@section('comments')
    <div class="row mb-5">
        
    <h4>Comentarios ({{count($Comments)}})</h4>

        <div class="col-md-12 my-2">
            <div class="row">
                <div id="newComment" class="col-12"> 
                <form method="POST" action="/comment/{{ $Post->id }}/create">
                    
                    @csrf
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <input type='text' class="form-control" name="user" placeholder="Your name" >
                                </div>
                            </div>
                            <div class="col-8">
                                <textarea style="width:100%;" cols="20" name="comment" class="form-control"></textarea>
                            </div>
                            <div class="col-2">
                                <input type="submit" value="save" class="btn btn-warning text-white w-100">
                            </div>
                        </div>

                    </form>
                </div>     
            </div>
            <hr>
            @foreach ($Comments as $Comment)
                <div class="row">
                    <div class="col-12">
                    <h7 class="text-primary">{{ $Comment->User }}</h7>
                    </div>

                    <div class="col-12">
                    <p>{{ $Comment->Comment }}</p>
                    </div>
                
                </div> 
                <hr>
            @endforeach
             
        </div>
    </div>
@endsection