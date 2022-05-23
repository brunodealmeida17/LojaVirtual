@extends('layouts.app')

@section('content')
    <h1>Criar Produto</h1>

    <form class="col-md-6" method="post" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
    @csrf
        <div class="form-group">            
            <input class="form-control mt-2 @error('name') is-invalid @enderror"type="text" name="name" placeholder="Nome do produto" value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>

            @enderror
        </div>
        <div class="form-group">            
            <input class="form-control mt-2 @error('description') is-invalid @enderror"type="text" name="description" placeholder="Descrição do produto" value="{{old('description')}}">
            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>

            @enderror
        </div>
        <div class="form-group">            
            <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="" cols="30" rows="10" placeholder="Conteudo">{{old('body')}}</textarea>
            @error('body')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
          
        </div>
        <div class="form-group">            
            <input class="form-control mt-2 @error('price') is-invalid @enderror"type="text" name="price" placeholder="Preço" value="{{old('price')}}">
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
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('categories')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Fotos do Produto</label>
            <input type="file" name="photos[]"  class="form-control @error('photos.*') is-invalid @enderror" multiple>
            @error('photos.*')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>         
        
        <div class="form-group">
            <button class="btn btn-lg btn-success mt-2"type="submit">Criar produto</button>
        </div>

    </form>
@endsection
