@extends('layouts.app')
@section('main')
  

    <div class="container-fluid px-4">
    
       
        
        <div class="card m-5" >
            <div class="card-header">
               
                Vasa porudžbina
            </div>
            <div class="card-body">
                @php
                    $total = 0;
                @endphp
                <table class="table" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Naziv produkta</th>
                            <th>Cena</th>
                            <th>Količina</th>
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
                                <td>{{Str::limit($cart->product->name, 20)}}</td>
                                <td>{{$cart->product->price}}</td>
                                <td>{{$cart->quantity}}</td>
                                <td>
                                    <input class="w-50 mt-2" type="number" name="quantity" value="{{ $cart->product->quantity }}" autocomplete="off" size="4">
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
                            @php
                                $total = $total + $cart->total;
                            @endphp
                         @endforeach
                    </tbody>
                </table>
                <div class="row col-10 offset-2 pt-3 m-auto border-top">
                    <div class="col m-2 d-flex">
                        <div class="col"></div>
                        <div class="col-6 m-auto"> </div>
                        <div class="col m-auto">
                            <h5>Ukupan: <strong>{{ $total }}</strong> din</h5>
                            @if($carts)
                            <a href="{{ route('create_purchase', $cart) }}"><button class="btn btn-primary btn-lg btn-block">Poruči</button></a>
                            @endif
                        </div>
                </div>
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