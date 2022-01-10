@extends('layouts.admin')
@section('main')


<div class="container-fluid px-4">
    <div class="row">
        @if(session()->has('message'))
        <div class="alert {{session('alert') ?? 'alert-info'}}">
            {{ session('message') }}
        </div>
        @endif
    </div>
        
    <h2 class="m-4">Produkti</h2>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Lista svih produkta
        </div>
        <div class="card-body">
            
            <table class="table" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Naziv produkta</th>
                        <th>Cena</th>
                        <th>Datum kreiranja</th>
                        <th>Tip Vozila</th>
                        <th>Azuriraj Artikl</th>
                        <th>Obriši Artikl</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Naziv produkta</th>
                        <th>Cena</th>
                        <th>Datum kreiranja</th>
                        <th>Tip Vozila</th>
                        <th>Azuriraj Artikl</th>
                        <th>Obriši Artikl</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}} din</td>
                        <td>{{$product->created_at}}</td>
                        <td>{{$product->vehicle_type}}</td>
                        <td>
                            <div class="col d-flex justify-content-center">
                                <a href="{{route('edit_product', $product->id)}}">
                                    <button class="btn btn-primary text-white" type="submit">
                                        <i class="fas fa-edit text-light "></i>
                                    </button>
                                </a>
                            </div>
                        </td>
                        <td>
                            <form action="{{route('destory_product',$product->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <div class="row">
                                    <div class="col d-flex justify-content-center">
                                    <button class="btn btn-danger text-white" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
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
@endsection