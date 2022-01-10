@extends('layouts.app')
@section('main')
    <div class="container m-5">
        <div class="row">
            
            <h3 class="pb-5 .text-center">Vaša porudzbina:</h3>
        </div>
        @php
            $total = 0;
        @endphp
        @foreach ($carts as $cart)
            <form action="{{ route('cart_update', $cart) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('put')
                <div class="row col-10 offset-2 m-auto border-top">
                        <div class="col m-2 d-flex ">
                            <div class="col">
                                <img src="/storage/app/public/uploads/{{$cart->product->image}}" width="100" height="60" alt="">
                            </div>
                    
                            <div class="col-4 m-auto">
                                <h6>{{Str::limit($cart->product->name, 30)}}</h6>
                            </div>
                    
                            <div class="col m-auto">
                                <h5> <strong>{{ $cart->product->price }}</strong> din</h5>
                            </div>
                            <div class="col">
                                <input class="w-50 mt-2" type="number" name="quantity" value="{{ $cart->product->quantity }}" autocomplete="off" size="2">
                                <button type="submit" class="btn" title="Azuriraj"><i class="fa fa-edit"></i></button>
                            </div>
            </form>
            <form action="{{ route('destroy_cart', $cart) }}" enctype="multipart/form-data" method="post">
                @csrf
                @method('delete')
                            <div class="col">
                                <button class="btn btn-danger btn-sm mt-2">
                                    <i class="fa fa-trash m-auto "></i>
                                </button>
                            </div>
            </form>
                        </div>
                </div>
                @php
                    $total = $total + $cart->total;
                @endphp
         @endforeach

        <div class="row col-10 offset-2 m-auto border-top">
            <div class="col m-2 d-flex">
                <div class="col"></div>
                <div class="col-6 m-auto"> </div>
                <div class="col m-auto">
                    <h6>Ukupan iznos: <strong>{{ $total }}</strong> din</h6>
                </div>
        </div>
        

    </div>

    <div class="container-fluid px-4">
    
       
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Vasa porudzbina
            </div>
            <div class="card-body">
                
                <table class="table" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Naziv produkta</th>
                            <th>Cena</th>
                            <th>Kolicina</th>
                            <th>Izmenite kolicina</th>
                            <th>Uklonite produkt</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($carts as $cart)
                        <form action="{{ route('cart_update', $cart) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('put')
                            <tr>
                                <td>{{$cart->product->name}}</td>
                                <td>{{$cart->product->price}}</td>
                                <td>{{$cart->product->quantity}}</td>
                                <td>
                                    <input class="w-50 mt-2" type="number" name="quantity" value="{{ $cart->product->quantity }}" autocomplete="off" size="2">
                                    <button type="submit" class="btn" title="Azuriraj"><i class="fa fa-edit"></i></button>
                                </td>
                        </form>
                                <td>
                        
                                    <form action="{{ route('destroy_cart', $cart) }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        @method('delete')
                                                    <div class="col">
                                                        <button class="btn btn-danger btn-sm mt-2">
                                                            <i class="fa fa-trash m-auto "></i>
                                                        </button>
                                                    </div>
                                    </form>
                                </td>

                            </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="alert pt-5">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Postovani</strong> Ukoliko vam produkt ne odgovara, mozete ga lako zameniti
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
@endsection