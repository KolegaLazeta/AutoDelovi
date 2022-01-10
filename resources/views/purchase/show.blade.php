@extends('layouts.admin')
@section('main')
<main>
    

    <div class="container-fluid px-4">
        <h1 class="mt-4">Komandna Tabela</h1>
       
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Nedavne poruzbine
            </div>
            <div class="card-body">
                
                <table class="table" id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Ime</th>
                            <th>E-main</th>
                            <th>Porudzbina</th>
                            <th>Datum</th>
                            <th>Ukupna Cena</th>
                            <th>Obrisi porudzbinu</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Ime</th>
                            <th>E-main</th>
                            <th>ID porudzbine</th>
                            <th>Datum</th>
                            <th>Ukupna Cena</th>
                            <th>Obrisi porudzbinu</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($purchases as $purchase)
                            <tr>
                                <td>{{$purchase->users->name}}</td>
                                <td>{{$purchase->users->email}}</td>
                                <td>{{ $purchase->id }}</td>
                                <td>{{ $purchase->created_at }}</td>
                                <td>
                                    <a href="{{route('purchase_info' ,$purchase) }}">
                                        <div class="col d-flex justify-content-center">
                                            <button class="btn btn-primary">
                                                <i class="fas fa-info-circle fa-lg"></i>
                                            </button>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('destroy_purchase', $purchase)}}" method="post">
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
</main>
@endsection