@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-8 mt-4">

                <div class="row">
                @foreach($PostsByCategory as $Posts => $Publicacion)

                        <div class="col-6">
                            <h4 class="my-4">
                                {{ $Publicacion->Title }}
                            </h4>
                            <!-- Blog Post -->
                            <div class="card mb-12">
                                <!-- Ruta imagen defecto http://placehold.it/750x300-->
                                <img class="card-img-top" style="height: 220px" src="{{ $AppBasePublic }}{{ $Publicacion->Imagen }}" alt="Card image cap">
                                <div class="card-body">
                                    <h2 class="card-title">{{ $Publicacion->Title }}</h2>
                                    <a href="/post/{{ $Publicacion->id }}" class="btn btn-primary">Seguir leyendo &rarr;</a>
                                </div>

                            </div>
                        </div>


                @endforeach
                </div>

        </div>

@endsection


