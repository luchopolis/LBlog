@extends('layouts.Post')
@section('content')
<div class="row mt-4">
    <div class="col-12">
        <div class="col-12 text-center">
            <h4>Editar</h4>
        </div>
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="/post/{{ $post->id }}/update" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                                <div class="col-12 mb-2">
                                    <button type="submit" class="btn btn-dark w-100">Guardar</button>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="Title" name="Title" placeholder="Titulo" value="{{ $post->Title }}">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="Extract" name="Extract" placeholder="Extracto a mostrar" value="{{ $post->Extract }}">
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
                                            @if($Category->id == $post->category_id)
                                                <option value="{{ $Category->id }}" selected>{{ $Category->Name }}</option>
                                            @else
                                                <option value="{{ $Category->id }}">{{ $Category->Name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <textarea style="width: 100%; height: 450px" name="content" id="postTextArea" cols="30" rows="10">{{ $post->Content }}</textarea>
                        </div>


                    </form>
                </div>
            </div>


        </div>
    </div>

    @endsection
