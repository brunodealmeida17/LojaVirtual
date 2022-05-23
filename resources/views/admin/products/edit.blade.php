@extends('layouts.app')

@section('content')
    <h1>Atualizar Produto</h1>
    <h5 style="color: red"><b> *Os campos que não irão ter atualização favor não mexer!</b></h5>

    <form class="col-md-6" method="post" action="{{route('admin.products.update', ['product' => $product->id])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">  
            <label for="">Nome do produto</label>          
            <input class="form-control mt-2 @error('name') is-invalid @enderror"type="text" name="name" placeholder="Nome do produto" value="{{$product->name}}">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">
        <label for="">Descrição do produto</label>               
            <input class="form-control mt-2 @error('description') is-invalid @enderror"type="text" name="description" placeholder="" value="{{$product->description}}">
            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">     
        <label for="">Conteúdo do produto</label>          
            <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="" cols="30" rows="10"> {{$product->body}}</textarea>
            @error('body')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
          
        </div>

        <div class="form-group"> 
        <label for="">Preço do produto</label>              
            <input class="form-control mt-2 @error('price') is-invalid @enderror"type="text" name="price" placeholder="Preço" value="{{$product->price}}">
            @error('price')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
       
        
        <div class="form-group">
            <label for="">Categorias</label>
            <select name="categories[]" id="" class="form-control @error('categories') is-invalid @enderror" multiple>
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                     @if($product->categories->contains($category)) selected @endif
                        >{{$category->name}}</option>
                @endforeach
            </select>
            @error('categories')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-group">           

            <label for="">Fotos do produtos</label>
            <input type="file" name="photos[]"  class="form-control @error('photos.*') is-invalid @enderror" multiple>
            @error('photos.*') 
                <div class="invalid-feedback">
                    {{$message}}
                </div>    
            @enderror 
        </div> 

        <div class="form-group">
            <button class="btn btn-lg btn-primary mt-2"type="submit">Atualizar produto</button>
        </div>

    </form> 
    
    <div class="row">
        @foreach($product->photos as $photo)
            <div class="col-4 text-center">
                <img src="{{ asset('storage/' . $photo->image) }} " alt="" class="border border-info img-fluid" style="width: 50%"/>            

                <form action="{{route('admin.photo.remove')}}" method="POST">
                    @csrf
                    <input type="hidden" name="PhotoName" value="{{$photo->image}}">
                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>
        @endforeach
    </div>

   

@endsection
