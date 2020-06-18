
@extends('layouts.base')

@section('content')
    <div class="row">

        <div class="col-md-8 mt-4">
            <h2 class="text-center">
                Todas las categorias
            </h2>
            <div class="col-12">
                <h4>
                    Categorias
                </h4>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th>
                        Categoria
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($Categories as $Category => $Categoria)
                    <tr>
                        <td><a href="/categories/{{ $Categoria->id }}">{{ $Categoria->Name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    <!-- No se cierra el row en el blade se cierra-->
@endsection
