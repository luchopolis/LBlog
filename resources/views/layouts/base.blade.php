<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('styles/blog-home.css' )}}" rel="stylesheet">


    <!-- TINY MCE-->
    <script src="https://cdn.tiny.cloud/1/jwmu4wthnjhdibxn973clzvust2moisji20s4lt54saxo2jm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


    <!-- Remove border color TinyMCE-->

    <style>
        .tox-tinymce{
            border: none !important;
            border-bottom: none !important;
        }

        .tox-statusbar{
            display: none !important;
        }
    </style>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="/posts">
                    <img src="{{ asset('src/Cheto.png') }}" width="40" height="40" alt="" class="rounded">
                    Cheto
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/">
                                        Home
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>





<!-- Page Content -->
<div class="container">
<!-- <div id="loadergif" class="col-12">
      <img src="{{ asset('src/loader.gif') }}" alt="gif loader">
    </div> -->
@yield('content')


<!-- Sidebar Widgets Column -->
    <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
            <h5 class="card-header">Busqueda</h5>
            <div class="card-body">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                </div>
            </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
            <h5 class="card-header">Categorias<a href="/categories" class="float-right">ver todas</a></h5>
            <div class="card-body">
                <div class="row">
                    @foreach($Categories as $Categoria)
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">

                                <li>
                                    <a href="/categories/{{ $Categoria->id }}">{{ $Categoria->Name }}</a>
                                </li>

                            </ul>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
            <h5 class="card-header"></h5>
            <div class="card-body">

            </div>
        </div>

    </div>

</div>
<!-- /.row -->

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; ChetoBlog
            <a class="navbar-brand" href="/posts">
                <img src="{{ asset('src/Cheto.png') }}" width="40" height="40" alt="" class="rounded">
            </a>
        </p>

    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('bootstrap/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script type="text/javascript">


    //document.addEventListener('DOMContentLoaded',wait());
    window.onload = () => {
        tinymce.init({
            selector:"#tiny-body",
            menubar:false,
            toolbar: false,
            plugins: [ 'quickbars' ],
            readonly : 1
        });

    };
</script>



</body>

</html>
