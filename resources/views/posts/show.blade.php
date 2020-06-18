@extends('layouts.base')

@section('content')
    <div class="row">

        <div class="col-sm-12 col-md-8">
            <div class="card mb-4 mt-4">
                <div class="card-header">
                    <h2 class="card-title">{{ $Post->Title }}</h2>
                </div>
                <!-- Ruta imagen defecto http://placehold.it/750x300-->
                <div class="col-12 text-center">
                    <img class="img-fluis card-img-top m-2" style="width:70vh;height:50vh" src="{{ $AppBasePublic }}{{ $Post->Imagen }}" alt="Card image cap">
                </div>

                <div class="card-body">
                    <p class="card-text">{{ $Post->Content}}</p>
                </div>
                <div class="card-footer text-muted">
                    Posted on {{ $Post->created_at }}, by {{ $Post->user["UserName"] }}
                </div>
            </div>
        </div>
@endsection
