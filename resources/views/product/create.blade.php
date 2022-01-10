@extends('layouts.admin')
@section('main')
    
<div class="containter">
    <div class="row">
        @if(session()->has('message'))
        <div class="alert ml-3 {{session('alert') ?? 'alert-info'}}">
            {{ session('message') }}
        </div>
        @endif
    </div>
    <form action="{{route('store_product')}}" enctype="multipart/form-data" method="post">
        @csrf   
        
        <div class="row">
            
            <div class="col-8 offset-2">
                <div class="row">
                    <h2>Kreiraj artikl</h2>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Naziv</label>
    
                    
                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" 
                    name="name" 
                    value="{{ old('name') }}"  
                    autocomplete="name" autofocus placeholder="Naziv..">
    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>
                
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Deskripcija</label>
    
                    
                    <input id="description" type="description" class="form-control @error('deskripcija') is-invalid @enderror" 
                    name="description" 
                    value="{{ old('description')  }}"  
                    autocomplete="description" autofocus placeholder="Deskripcija..">
    
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label">Cena</label>
    
                    
                    <input id="price" type="price" class="form-control @error('cena') is-invalid @enderror" 
                    name="price" 
                    value="{{ old('price')}}"  
                    autocomplete="price" autofocus placeholder="din">
    
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>

                <div class="col pt-2">
                    <label for="category_id">Izaberite kategoriju</label>

                   <select name="category_id" style="height:40px;" class="form-select @error('category_id') is-invalid @enderror">

                    @foreach($categories as $category) 
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                    

                </select>
                </div>

                <div class="col pt-2">
                    <label for="brand_id">Izaberite brend</label>
                    <select name="brand_id" style="height:40px;" class="form-select @error('brand_id') is-invalid @enderror">

                    @foreach($brands as $brand) 
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach

                </select>
                </div>

                <div class="col pt-2">
                    <label for="vehicle_type">Izaberite tip vozila</label>
                    <select name="vehicle_type" style="height:40px;" class="form-select @error('vehicle_type') is-invalid @enderror">

                    @foreach($vehicle_type as $vt) 
                        <option value="{{$vt}}" selected="">{{$vt}}</option>
                    @endforeach

                </select>
                </div>

                
                <div class="col pt-3">
                    <label for="image" class="col-md-4 col-form-label">Slika artikla: </label> <br>
                    
                    <div class="col-md-12 mb-2">
                        <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif"
                            alt="preview image" style="max-height: 250px;">
                    </div>

                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                        
                            <strong>{{ $message }}</strong>
                       
                    @enderror
                </div>
                <div class="row pt-4">
                    <button class="btn btn-outline-dark">Kreiraj artikl</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
