@extends('layouts.base')

@section('content')
    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            @foreach($Posts as $Post => $Publicacion)
                <div class="col">
                    <h1 class="my-4">
                        {{ $Publicacion->Title }}
                    </h1>

                    <!-- Blog Post -->
                    <div class="card mb-4">
                        <!-- Ruta imagen defecto http://placehold.it/750x300-->
                        @empty($Publicacion->Imagen)
                            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                        @else
                            <img class="card-img-top" src=" {{ url("/imagesPost") }}" alt="Card image cap">
                        @endempty

                        <div class="card-body">
                            <h2 class="card-title">{{ $Publicacion->Title }}</h2>
                            <h6>{{ $Publicacion->Extract }}</h6>
                            <a href="/post/{{ $Publicacion->slug }}" class="btn btn-primary">Seguir leyendo &rarr;</a>
                        </div>
                        <div class="card-footer text-muted">
                         Posted on {{ $Publicacion->created_at }}, by {{ $Publicacion->user['UserName'] }}

                        </div>
                    </div>

                </div>
            @endforeach



        <!-- Pagination -->

        {{$Posts}}
        </div>
@endsection
