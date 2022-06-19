@extends('layouts.app')
@section('main')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators" style="color: black">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" >
      <div class="carousel-item active" >
        <img class="d-block w-100" height="600px" style="margin:auto" src="/img/slide1.jpg" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
            <h1 class="shadow-lg ">Delovi za Vaše Vozilo</h1>
            <h3 class="shadow-lg">Svi kvalitetni delovi za Vaše vozilo sa samo jednim klikom</h3>
          </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" height="600px" style="margin:auto" src="/img/slide2.jpg" alt="Second slide">
        <div class="carousel-caption d-none d-md-block">
            <h1 class="shadow-lg">Brendovi</h1>
            <h3 class="shadow-lg">Delovi najpoznatijih svetskih brendova automobila</h3>
          </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" height="600px" style="margin:auto" src="/img/slide3.jpg" alt="Third slide">
        <div class="carousel-caption d-none d-md-block">
            <h1 class="shadow-lg">Postanite naš član</h1>
            <h3 class="shadow-lg">Registujte se i budite deo naše zajednice</h3> 
          </div>
      </div>
    </div>
    <a class="carousel-control-prev"  href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  
  <h2 class="pt-5 pl-5">Najnoviji proizvodi:</h2>

  <div class="card-deck p-5 d=flex justify-content-center">
  
      @foreach($products as $product)

      <a href="/product/{{$product->id}}" class="text-dark">
      <div class="card" style="min-width:320px; max-width:320px; min-height:430px; max-height:430px">
          <img class="img-fluid" src="/storage/app/public/uploads/{{$product->image}}" style="object-fit: cover; height: 200px; alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{Str::limit($product->name, 20)}}</h5>
            <p class="card-text">{{Str::limit($product->description, 20)}}</p>
            <form action="{{route('cart.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <input type="product_id" value="{{ $product->id }}" name="product_id" id="product_id" hidden>
                <input type="number" value="1" name="quantity" hidden>
                <input type="total" value="{{ $product->price }}" name="total" hidden>
                @if (auth()->user() && auth()->user()->cart->contains('product_id', $product->id))
                  <button class="btn btn-outline-danger mt-3" disabled>
                    Dodato u korpi
                  </button>
                @else
                <button class="btn btn-outline-primary mt-3" type="submit">Dodaj u korpi</button>
                @endif
              </form>
        </div>
            <div class="card-footer">
              <small class="text-muted">{{$product->created_at}}</small>
            </div>
        </div>
      </a>

    @endforeach
    
  </div>
  

  <hr>

  <h2 class="pt-5 pl-5">Najpopularniji proizvodi:</h2>

  <div class="card-deck p-5">

    @foreach ($popularProducts as $product)
      
    <a href="/product/{{$product->id}}" class="text-dark">
      <div class="card" style="min-width:320px; max-width:320px; min-height:430px; max-height:430px">
          <img class="img-fluid" src="/storage/app/public/uploads/{{$product->image}}" style="object-fit: cover; height: 200px; alt="Card image cap">
      <div class="card-body">
            <h5 class="card-title">{{Str::limit($product->name, 20)}}</h5>
            <p class="card-text">{{Str::limit($product->description, 20)}}</p>
            <form action="{{route('cart.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                <input type="product_id" value="{{ $product->id }}" name="product_id" id="product_id" hidden>
                <input type="number" value="1" name="quantity" hidden>
                <input type="total" value="{{ $product->price }}" name="total" hidden>
                @if (auth()->user() && auth()->user()->cart->contains('product_id', $product->id))
                  <button class="btn btn-outline-danger mt-3" disabled>
                    Dodato u korpi
                  </button>
                @else
                <button class="btn btn-outline-primary mt-3" type="submit">Dodaj u korpi</button>
                @endif
              </form>
        </div>
            <div class="card-footer">
              <small class="text-muted">{{$product->created_at}}</small>
            </div>
        </div>
      </a>
    
    @endforeach
    
  </div>
  <hr>
  <h2 class="pt-5 pl-5">Naši partneri:</h2>

  <div class="borderless">
    <ul class="list-group flex-md-row p-5" style="align-items: center; justify-content:space-between">
      <li class="list-group-item" style="border: none; "><img src="/img/partners/1.png" alt=""></li>
      <li class="list-group-item" style="border: none; "><img src="/img/partners/2.png" alt=""></li>
      <li class="list-group-item" style="border: none; "><img src="/img/partners/3.png" alt=""></li>
      <li class="list-group-item" style="border: none; "><img src="/img/partners/4.png" alt=""></li>
      <li class="list-group-item" style="border: none; "><img src="/img/partners/5.png" alt=""></li>
      <li class="list-group-item" style="border: none; "><img src="/img/partners/6.png" alt=""></li>
    </ul>
  </div>

  <hr>
  <h2 class="pt-5 pl-5">Zašto smo najbolji!?</h2>

  @foreach ($comments as $comment)
    
  <div class="card text-white bg-secondary ml-5 mr-5 mt-5">
    <div class="card-header">
      {{ $comment->user->name }}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $comment->product->name }}</h5>
      <p class="card-text">{{ $comment->comment }}</p>
    </div>
  </div>
  
  @endforeach

  <hr>

  <div class="borderless">
    <ul class="list-group flex-md-row p-5" style="align-items: center; justify-content:space-between">
      <li class="list-group-item" style="border: none; "><h4>Najbolje cene!</h4><br>
        <p>AutoDelovi garantuje visokokvalitetne auto-delove po veoma atraktivnim cenama.
      </p></li>
      <li class="list-group-item" style="border: none; "><h4>Brza Isporuka!</h4><br>
        <p>Besplatna dostava u Srbiji pri kupovini većoj od 15000 dinara, osim prilikom naručivanja glomaznih predmeta.
      </p></li>
      <li class="list-group-item" style="border: none; "><h4>Način plaćanja!</h4><br>
        <p>Prihvatamo Paipal, Visa, Discover, American Ekpress i bankovni transfer.</p></li>
      <li class="list-group-item" style="border: none; "><h4>Raznovrsni delovi!</h4><br>
        <p>Trenutno naš asortiman proizvoda broji preko 1000 auto delova.
      </p></li>
   
    </ul>
  </div>
@endsection