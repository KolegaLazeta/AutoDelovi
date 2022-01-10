@extends('layouts.admin')
@section('main')
<div class="row">
    @if(session()->has('message'))
    <div class="alert ml-3 {{session('alert') ?? 'alert-info'}}">
        {{ session('message') }}
    </div>
    @endif
</div>
    <form action="{{route('store_category')}}"  enctype="multipart/form-data" method="post">
        @csrf
        <div class="row m-5">
            
            <div class="col-8 offset-2">
               
                <div class="row">
                    <h2> Dodaj kategoriju </h2>
                </div>

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Naziv Kategorije</label>
    
                    
                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" 
                    name="name" 
                   
                    value="{{ old('name') }}"  
                    autocomplete="name" autofocus>
    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    

                    <div class="col pt-3">
                        <label for="image" class="col-md-4 col-form-label">Slika Kategorije: </label> <br>
                        
                        <div class="col-md-12 mb-2">
                            <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                                alt="preview image" style="max-height: 250px;">
                        </div>

                        <input type="file" class="form-control-file" id="image" name="image">
                        @error('image')
                            
                                <strong>{{ $message }}</strong>
                           
                        @enderror
                    </div>
                    
                </div>
                

                <div class="row pt-4">
                    <button class="btn btn-outline-dark" value="submit">Kreiraj kategoriju</button>
                </div>
            </div>
        </div>
    </form>
    
@endsection
