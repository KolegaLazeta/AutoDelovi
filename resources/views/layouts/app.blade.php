<!DOCTYPE html>
<head>
    <title>Auto-Delovi</title>
    
    <link rel="stylesheet" type="text/css" href="/css/app.css" >
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="/img/logo.png">
</head>
<body>
    
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="{{route('home')}}">
            <img height="60px" src="/img/logo.png" alt="">
        </a>
        
        <h4 class="ml-auto" style="font-style: italic; padding-top:10px" >- Sve za Vase vozilo -</h4>
        
        <div class="nav-link ml-auto">

          @if(auth()->check())
            @if(auth()->user()->role == ('admin'))
              <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} 
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('admin')}}">Kontrolni centar</a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                      Odjavite se
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>   
            @else
                                
              @if(auth()->user())
                <a class="nav-link text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-lg mr-1" aria-hidden="true"></i> Odjavite se</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              @endif
            @endif
          @else
              <a class="nav-link text-dark" href="{{route('login')}}"><i class="fa fa-sign-in fa-lg mr-1" aria-hidden="true"></i> Prijavite se</a>
          @endif

        </div>
    </nav>

      <header class="navbar navbar-expand-lg navbar-dark bg-secondary">  
          
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link text-light" href="{{route('home')}}">Početna<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="{{route('all_products')}}">Produkti</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategorije</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @yield('categories')
                    @foreach ($categories as $category)
                      <a class="dropdown-item" href="{{ route('category_products', $category) }}">{{ $category->name }}</a>
                    @endforeach
                  </div>
                </li>
                
              
              </ul>
              <form class="form-inline my-2 my-lg-0" type="get" enctype="multipart/form-data" action="{{route('search_products')}}">
                @csrf
                <input class="form-control mr-sm-2" name="query" type="search" placeholder="Pretraga proizvoda.." aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
              </form>
            </div>
            
            @if(Auth::user())
              <a class="nav-link text-light" href="{{route('cart')}}" tabindex="-1" aria-disabled="true"> 
                <i class="fa fa-shopping-bag fa-lg"><span class="badge badge-light ml-1">{{ count(auth()->user()->cart) }}</span> </i></a> 
            @else
              <a class="nav-link text-light" href="{{route('login')}}" tabindex="-1" aria-disabled="true"><i class="fa fa-shopping-bag fa-lg"></i></a> 
            @endif

      </header>

      <main>
        @yield('main')
      </main>
      


<footer class="text-white bg-secondary text-center text-lg-start">
  <!-- Grid container -->
  <div class="container p-4">
    <!--Grid row-->
    <div class="row">
      <!--Grid column-->
      <div class="col-lg-6 col-md-12 pr-5 mb-4 mb-md-0">
        <h5 class="text-uppercase">Gde nas možete pronaći</h5>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2921.4176515727513!2d20.81315060069665!3d42.92732132818893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDLCsDU1JzM4LjQiTiAyMMKwNDgnNTIuMCJF!5e0!3m2!1ssr!2srs!4v1633445151361!5m2!1ssr!2srs" width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 pl-5 mb-md-0">
        <h5 class="text-uppercase">Društvene mreže</h5>

        <ul class="list-unstyled mb-0">
          <li class="pt-3">
            <a href="#!" class="text-white"> <i class="fa fa-instagram pr-1"></i> Instagram</a>
          </li>
          <li class="pt-3">
            <a href="#!" class="text-white"><i class="fa fa-facebook pr-1"></i>Facebook</a>
          </li>
          <li class="pt-3">
            <a href="#!" class="text-white"><i class="fa fa-twitter pr-1"></i>Twitter</a>
          </li>
          <li class="pt-3">
            <a href="#!" class="text-white"><i class="fa fa-pinterest-p pr-1"></i>Pinterest</a>
          </li>
        </ul>
      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase mb-0">Informacije</h5>

        <ul class="list-unstyled">
          <li class="pt-3">
            <a href="#!" class="text-white "> <i class="fa fa-phone pr-1"></i> 0641234567</a>
          </li>
          <li class="pt-3">
            <a href="#!" class="text-white pt-3"> <i class="fa fa-envelope pr-1"></i> autodelovi21@gmail.com</a>
          </li>
          <li class="pt-3">
            <a href="#!" class="text-white"> <i class="fa fa-map-pin pr-1"></i> Žerovnica, Doljane BB</a>
          </li>
          <li>
            <a href="#!" class="text-white"></a>
          </li>
        </ul>
      </div>
      <!--Grid column-->
    </div>
    <!--Grid row-->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white" href="">Dimitrije Minic</a>
  </div>
  <!-- Copyright -->
</footer>
</body>
<script src="/js/myapp.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  </html>