@extends('layouts.app')
@section('main')

  <div class="card flex-row flex-wrap mt-5 mb-5">
   
  @foreach($categories as $category)

  <div class="card bg-dark text-white">
    <img class="card-img" src="/storage/app/public/uploads/{{$category->image}}" style="object-fit: cover; height: 300px; width:400px" alt="Card image">
    <div class="card-img-overlay">
      <h5 class="card-title">{{$category->name}}</h5>
    
    </div>
  </div>
  @endforeach





  
@endsection