@extends('layouts.admin')
@section('main')
<div class="containter">
    <form action="{{route('update_product', $product->id)}}" enctype="multipart/form-data" method="post">
        @csrf   
        @method('PATCH')
        
        
        <div class="row m-3">
            <h3>Izmenite produkt</h3>
        </div>
        <div class="row border">
            
            <div class="col-8 offset-2">
                <div class="row m-4 ">
                    
                        <h4>Naziv produkta: <strong>{{$product->name}}</strong></h4>
                  
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Naziv</label>
    
                    
                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" 
                    name="name" 
                    value="{{ old('name')}}"  
                    autocomplete="name" autofocus>
    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>
                
                <div class="form-group row">
                    <label for="description" class="col-md-4 col-form-label">Deskripcija</label>
    
                    
                    <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" 
                    name="description" 
                    value="{{ old('description')}}"  
                    autocomplete="description" autofocus>
    
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-4 col-form-label">Cena</label>
    
                    
                    <input id="price" type="price" class="form-control @error('price') is-invalid @enderror" 
                    name="price" 
                    value="{{ old('price')}}"  
                    autocomplete="price" autofocus>
    
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


                
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Slika produkta</label>

                    <input type="file" class="form-control-file" id="image" name="image">
                    @error('image')
                        
                            <strong>{{ $message }}</strong>
                       
                    @enderror
                </div>
                <div class="row pt-4">
                    <button type="submit" class="btn btn-outline-dark">Kreiraj artikl</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection