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
        
    <h2 class="m-4">Brendovi</h2>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Lista svih brendova
        </div>
        <div class="card-body">
            
            <table class="table" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Datum kreiranja</th>
                        <th>Obriši brend</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Naziv</th>
                        <th>Datum Kreiranja</th>
                        <th>Obriši brend</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($brands as $brand)
                    <tr>
                        <td>{{$brand->id}}</td>
                        <td>{{$brand->name}}</td>
                        <td>{{$brand->created_at}}</td>
                        <td>
                            <form action="{{route('destroy_brand',$brand)}}" method="post">
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