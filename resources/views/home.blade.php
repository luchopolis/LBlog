@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 m-1 rounded shadow-sm">
            @empty($myPosts)
            @else
                @foreach($myPosts as $post)

                    <div class="col-12 border m-2 rounded">
                        <div class="col-12 m-2">
                            <div class="row p-1">


                                    <div class="col-2">
                                        <a href="/post/{{ $post->id }}/edit" style="text-decoration: none">
                                            <img src="{{ asset('storage/postImages') }}{{ $post->Imagen }}" class="rounded img-post" width="100%" height="100%" alt="">
                                        </a>
                                    </div>
                                    <div class="col-7 col-sm-4">
                                        <a href="/post/{{ $post->id }}/edit" style="text-decoration: none" class="text-white">
                                            <div class="col-12">
                                                <div>{{ $post->Title }}</div>
                                                <div class="mt-1">{{ substr($post->created_at,0,10) }}</div>
                                            </div>
                                        </a>

                                    </div>

                                <div class="col-3 col-sm-4 float-right text-center">
                                    <div class="row">
                                        <div class="col-6 mt-2">
                                            <button data-toggle="modal" class="btn text-white" data-target="#deletemodal">
                                                <i class="fas fa-trash">
                                                </i>
                                            </button>
                                        </div>
                                        <div class="col-6 mt-2">
                                            <button class="btn text-white" >
                                                <a href="/post/{{ $post->slug }}" style="text-decoration: none" class="text-white">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </button>
                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>


                @endforeach
            @endempty

        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="newPost" role="document" style="max-width:40%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Elimar post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="col">
            <div class="alert alert-danger">Procederá a elimnar el post</div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        @empty($post)
            @else
                <a href="/post/{{ $post->id }}/confirmDelete" class="btn btn-danger">Confirmar</a>
        @endempty
      </div>
    </div>
  </div>
</div>




@if( session()->has('newPost') )
    <div class="successPost">
        <p class="alert alert-success">{{ session('newPost') }}</p>
    </div>
@endif
 
@endsection
