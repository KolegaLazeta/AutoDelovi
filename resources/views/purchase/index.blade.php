@extends('layouts.app')
@section('main')


<div class="containter">

    <div class="row d-flex justify-content-center">
        @if(session()->has('message'))
        <div class="col-12 alert m-auto {{session('alert') ?? 'alert-info'}}">
            {{ session('message') }}
        </div>
        @endif
    </div>

    <form action="{{route('store_purchase')}}" enctype="multipart/form-data" method="post">
        @csrf   
        
        <div class="row p-5">
            
            <div class="col-8 offset-2">
                <div class="row">
                    <h2 class="p-4">Unesite svoje podatke</h2>
                </div>
                <div class="row">
                    <div class="form-group col">
           
                        <input id="first_name" type="first_name" class="form-control @error('first_name') is-invalid @enderror" 
                        name="first_name" 
                        value="{{ old('first_name') }}"  
                        autocomplete="first_name" autofocus placeholder="Ime...">
        
                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                    <div class="form-group col">

                        <input id="last_name" type="last_name" class="form-control @error('last_name') is-invalid @enderror" 
                        name="last_name" 
                        value="{{ old('last_name') }}"  
                        autocomplete="last_name" autofocus placeholder="Prezime...">
        
                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col">
                        
                        <input id="address1" type="address1" class="form-control @error('address1') is-invalid @enderror" 
                        name="address1" 
                        value="{{ old('address1')  }}"  
                        autocomplete="address1" autofocus placeholder="Naziv ulice i broj zgrade">
        
                        @error('address1')
                            <span class="invalid-feedback" role="alert">
                                <strong>Upisite svoju adresu</strong>
                            </span>
                        @enderror
                        
                    </div>

                    <div class="form-group col">
                        
                        <input id="address2" type="address2" class="form-control @error('address2') is-invalid @enderror" 
                        name="address2" 
                        value="{{ old('address2')  }}"  
                        autocomplete="address2" autofocus placeholder="Stan, kuca, kancelarija...">
        
                        @error('address2')
                            <span class="invalid-feedback" role="alert">
                                <strong>Upisite svoju adresu</strong>
                            </span>
                        @enderror
                        
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-8">
                            
                        <input id="city" type="city" class="form-control @error('city') is-invalid @enderror" 
                        name="city" 
                        value="{{ old('city')  }}"  
                        autocomplete="city" autofocus placeholder="Naziv grada...">
        
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>Unesite naziv grada</strong>
                            </span>
                        @enderror
                        
                    </div>

                    <div class="form-group col-4">
                            
                        <input id="zip" type="zip" class="form-control @error('zip') is-invalid @enderror" 
                        name="zip" 
                        value="{{ old('zip')  }}"  
                        autocomplete="zip" autofocus placeholder="Postanski broj...">
        
                        @error('zip')
                            <span class="invalid-feedback" role="alert">
                                <strong>Upisite postanski broj</strong>
                            </span>
                        @enderror
                        
                    </div>
                 </div>
                 
                <div class="row">
                    <div class="form-group col">
           
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                        name="email" 
                        value="{{ old('email') }}"  
                        autocomplete="email" autofocus placeholder="Email...">
        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>Unesite svoj email</strong>
                            </span>
                        @enderror
                        
                    </div>
                    <div class="form-group col">

                        <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" 
                        name="phone" 
                        value="{{ old('phone') }}"  
                        autocomplete="phone" autofocus placeholder="Broj telefona...">
        
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>Unesite svoj broj telefona</strong>
                            </span>
                        @enderror
                        
                    </div>
                </div>

                <input name="user_id" value="{{Auth::user()->id}}" type="hidden">

                <div class="row pt-4">
                <div class="col">
                    <button class="btn btn-outline-dark" type="submit">Naruci!</button>
                </div>
                </div>

            </div>
        </div>
    </form>
</div>
@endsection