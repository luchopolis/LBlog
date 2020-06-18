@extends('layouts.Post')
@section('content')
        <div class="row mt-4">
            <div class="col-12">
                <div class="col-12 text-center">
                    <h4>Nuevo post</h4>
                </div>
                <div class="col-12">
                    <div class="card mb-2">
                        <div class="card-header">

                        </div>

                        <div class="card-body">
                            <form method="POST" id="form" action="/post/{{ Auth::user()->id }}/create" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Titulo</label>
                                            <input type="text" id="title" name="title" class="form-control" placeholder="Titulo">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Extracto</label>
                                            <input type="text" id="extract" name="extract" class="form-control" placeholder="Extracto a mostrar">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                            <div class="form-group">
                                                <label for="">Imagen de presentación</label>
                                                <input class="form-control" type="file" id="Image" name="Image">
                                            </div>
                                    </div>
                                    <div class="col">
                                            <div class="form-group">
                                                <label for="">Categoria del post</label>
                                                <select class="form-control" name="category" id="category">
                                                    @foreach($Categories as $Category)
                                                        <option value="{{ $Category->id }}">{{ $Category->Name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                    </div>

                                </div>

                                <!-- <img id="imgtemp" name="imgtemp" width="100px" height="100px"> -->

                                <div class="form-group">

                                    <div class="col-12 mb-2">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <div class="float-right">
                                            <button class="btn btn-success text-white" name="btnPreview" id="btnPreview"><i class="mr-1 fas fa-binoculars text-warning"></i>Vista previa</button>
                                        </div>

                                    </div>

                                    <textarea style="width: 100%; height: 450px" name="content" id="postTextArea" cols="30"
                                    rows="10">{!! old('post') !!}</textarea>
                                </div>


                            </form>
                        </div>
                    </div>


                </div>
            </div>
            <script src="{{ asset('js/preview.js') }}"></script>


@endsection
