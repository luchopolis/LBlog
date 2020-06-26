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
    <div class="row">
        <div class="col-md-12">
            <div class="md-auto">Comments</div>
        </div>
    </div>
@endsection