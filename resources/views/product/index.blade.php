@extends('layouts.app')
@section('main')

<div class="container">
    

    <div class="row m-5">
        <div class="col">
            <img src="/storage/app/public/uploads/{{$product->image}}" style="object-fit: cover;" height="500" width="600" class="img-responsive" alt="">
        </div>
        <div class="col mt-3">
            <h2> {{$product->name}}</h2>
            <p> {{$product->description}}</p>
            <p><strong>Kategorija:</strong><a href="{{ route('category_products', $product->category) }}"> {{$product->category->name}}</a></p>
            <p><strong>Brend:</strong><a href="{{ route('brand_products', $product->brand) }}"> {{ $product->brand->name}} </a></p>
            <p><strong>Tip vozila:</strong> <a href={{ route('vehicle_type_products', $product->vehicle_type)}}> {{ $product->vehicle_type}} </a></p>
           
            <hr>
            <h4><strong>Cena: </strong>{{$product->price}} dinara</h4>

        
            <div class="row d-flex mt-3">
                @if (auth()->user())
                    <form action="{{route('cart.store')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <input type="product_id" value="{{ $product->id }}" name="product_id" id="product_id" hidden>
                        <input type="number" value="1" name="quantity" hidden>
                        <input type="total" value="{{ $product->price }}" name="total" hidden>
                            @if (auth()->user()->cart->contains('product_id', $product->id))
                            <button class="btn btn-outline-primary mr-2" disabled>
                                Dodato u korpi
                            </button>
                            @else
                                <button class="btn btn-primary mr-2" type="submit">Dodaj u korpi</button>
                            @endif
                            
                    </form>
                @else
                    <a href="{{ route('login') }}"><button class="btn btn-primary mr-2">Dodaj u korpi</button></a>
                @endif
            
               <a href="{{route('create_purchase', $product)}}"> <button class="btn btn-danger">Kupi Odmah</button></a>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
    
        
            <div class="container mb-5">
                <div class="d-flex justify-content-center row">
                    <div class="d-flex flex-column col-md-8">
                        <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                            <div class="profile-image"></div>

                            <div class="d-flex flex-column ml-3">
                                <div class="d-flex flex-row post-title  ">
                                    <h5>{{ $product->name }}</h5> <span class="ml-2 mt-">U nasoj e-prodavnici od {{ $product->created_at->format('Y-m-d') }}</span>
                                </div>
                                <div class="d-flex flex-row align-items-center align-content-center post-title"><span class="mr-2 comments">{{ count($product->comment) }} Komentara</span></div>
                            </div>
                        </div>
                        <div class="coment-bottom bg-white p-2 px-4">
                                
                            <form action="{{ route('store_comment', $product) }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="d-flex flex-row add-comment-section mt-4 mb-4">

                                    <input class="form-control mr-3" type="text" name="comment" value="{{ old('comment') }}">
                                    <input id="user_id" name="user_id" value="{{Auth::user()}}" type="hidden">
                                    <input id="product_id" name="product_id" value="{{$product->id}}" type="hidden">
                                    <button class="btn btn-outline-primary" type="submit">Potvrdi</button>
                                </div>
                            </form>
                          
                           

                            
                           
                            <div class="collapsable-comment">
                                <div class="d-flex flex-row justify-content-between align-items-center action-collapse p-2"
                                data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#collapse-1">
                                <span>Komentari</span><i class="fa fa-chevron-down servicedrop"></i></div>
                                <div id="collapse-1" class="collapse">
                                    
                                    @foreach ($product->comment as $comment)
                                        
                                    <div class="commented-section mt-2 border-top">
                                        
                                        <div class="d-flex flex-row align-items-center commented-user ">
                                            <h5 class="mr-2">{{ $comment->user->name }}</h5><span class="dot mb-2"></span><span class="mb-2 ml-2">{{ $comment->created_at->format('d-m-y') }}</span>
                                        </div>
                                        <div class="comment-text-sm">{{ $comment->comment }}<span></span></div>
                                        
                                        
                                    </div>
                                    
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <h2 class="pt-5 pl-5">Slicni proizvodi:</h2>

        <div class="card-deck p-5">
        
            @foreach($recomendedProducts as $product)

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
    </div>
</div>

@endsection