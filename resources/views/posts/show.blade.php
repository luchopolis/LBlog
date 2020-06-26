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
        
        <h4>Comentarios</h4>

        <div class="col-md-12 my-2">
            <div class="row">
                <div id="newComment" class="col-12"> 
                    <form>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-group">
                                    <input type='text' class="form-control" placeholder="Your name" >
                                </div>
                            </div>
                            <div class="col-8">
                                <textarea style="width:100%;" cols="20" ></textarea>
                            </div>
                            <div class="col-2">
                                <input type="button" value="save" class="btn btn-warning text-white w-100">
                            </div>
                        </div>
                        
                       
                        

                        
                    </form>
                </div>
               
                   
                
            </div>
            <hr>
            <div class="row">
                <div class="col-12">
                    <h7 class="text-primary">Nombre</h7>
                </div>

                <div class="col-12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam convallis orci at ipsum ornare, a fringilla nisl lacinia. Pellentesque eleifend accumsan urna, vitae lacinia neque malesuada vel. Proin sed neque euismod, eleifend orci ut, fermentum orci. Proin at est at lacus porta fringilla. Vestibulum lectus lectus, blandit quis diam non, interdum commodo lorem. Morbi quis nibh iaculis, commodo diam in, tincidunt eros. Aliquam rhoncus imperdiet varius.</p>
                </div>

            </div>
            
           
        </div>
    </div>
@endsection