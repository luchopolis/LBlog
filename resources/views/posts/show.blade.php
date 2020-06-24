@extends('layouts.base')

@section('content')
    <div class="row">

        <div class="col-sm-12 col-md-8">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <h2 class="card-title">{{ $Post->Title }}</h2>
                </div>
                <!-- Ruta imagen defecto http://placehold.it/750x300-->
               

                <div class="card-body">
                    
                    <textarea style="width: 100%; height: 450px" name="content" id="tiny-body" cols="30"
                                    rows="10">{{ $Post->Content}}</textarea>
  
                </div>
                <div class="card-footer text-muted">
                    Posted on {{ $Post->created_at }}, by {{ $Post->user["UserName"] }}
                </div>
            </div>
        </div>
@endsection
