@extends('layouts.app')
@section('categories')
@foreach ($categories as $category)
@endforeach
@section('main')
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <h3 class="m-4">Proizvodi kategorije {{ $category->name }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="alert ">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Pozdrav korisnice </strong>Ovde mozes listati sve produkte koje ce te mozda zainteresovati. Veliki asortiman produkta ce ti pomoci da pronadjes neke nove dodatke za tvoje vozilo
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
    </div>
    <div class="card-deck m-5 mt-0">

      @foreach($productsByCategory as $product)
     
        
      <a href="/product/{{$product->id}}" class="text-dark">
        <div class="card">
          <img class="img-fluid" src="/storage/app/public/uploads/{{$product->image}}" style="object-fit: cover; height: 200px; width:310px" alt="Card image cap">
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


  
@endsection