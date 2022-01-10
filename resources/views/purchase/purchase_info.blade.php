@extends('layouts.admin')
@section('main')
<div class="container mt-3">
    <h4 class="mb-2">Porudzbina</h4>
    <div class="table-responsive ">
        <table class="table">
            <thead>
                <tr>
                    <th class="">Proizvod</th>
                    <th class=""></th>
                    <th class="">Cena</th>
                    <th class="">Kolicina</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($purchase->products as $product)
                <tr>
                        <td>
                                <img style="width:150px;" src='/storage/app/public/uploads/{{$product->product->image}}' alt="#">
                            </a>
                        </td>
                        <td class="cart_description">
                            <h4>{{Str::limit($product->product->name, 30)}}</h4>
                        </td>
                        <td class="cart_price">
                            <p>{{$product->product->price}}</p>
                        </td>
                        <td class="cart_quantity">
                                {{$product->quantity}}
                        </td>
                </tr>
                @php
                    $total = $total + $product->price
                @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row m-1">
    <h4 class="mb-2">Informacije</h4>

        <table class="table ">
            <thead>
                <th>Kupac</th>
                <th>E-mail</th>
                <th>Adresa</th>
                <th>Br Telefona</th>
                <th>Ukupan iznos</th>
            </thead>    
            <tbody>
               
                <td>{{ $purchase->first_name }}</td>
                <td>{{ $purchase->email }}</td>
                <td>{{ $purchase->address1 }}</td>
                <td>{{ $purchase->phone }}</td>
                <td>{{ $total }}</td>
            </tbody>
        </table>        
    </div>
</div>
@endsection