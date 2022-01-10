@extends('layouts.app')
@section('main')


<div class="container">

  <div class="card flex-row flex-wrap mt-5 mb-5">
   
  @foreach($brands as $brand)

    <a href="/brands/{{$brand->id}}"></a>
        <div class="card bg-dark text-white">
            <img class="card-img" src="/storage/app/public/uploads/{{$brand->image}}" alt="Card image">
            <div class="card-img-overlay">
            <h5 class="card-title">{{$brand->name}}</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text">Last updated 3 mins ago</p>
            </div>
        </div>
    </a>    
  @endforeach



</div>


  
@endsection