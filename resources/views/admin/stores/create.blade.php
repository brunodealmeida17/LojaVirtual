@extends('layouts.app')

@section('content')
    <h1>Criar Lojas</h1>

    <form class="col-md-6" method="post" action="{{route('admin.stores.store')}}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">            
            <input class="form-control mt-2 @error('name') is-invalid @enderror"type="text" name="name" placeholder="Nome da Loja" value="{{old('name')}}">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>

            @enderror

        </div>
        <div class="form-group">            
            <input class="form-control mt-2 @error('description') is-invalid @enderror"type="text" name="description" placeholder="Descrição" value="{{old('description')}}">
            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>

            @enderror
        </div>
        <div class="form-group">            
            <input class="form-control mt-2 @error('phone') is-invalid @enderror"type="text" name="phone" placeholder="Telefone" value="{{old('phone')}}">
            @error('phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>

            @enderror
        </div>
        <div class="form-group">            
            <input class="form-control mt-2 @error('mobile_phone') is-invalid @enderror" type="text" name="mobile_phone" placeholder="Celular/WhatsApp" value="{{old('mobile_phone')}}">
            @error('mobile_phone')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror            
        </div>

        <div class="form-group">            
            <input class="form-control mt-2 @error('Endereco') is-invalid @enderror" type="text" name="Endereco" placeholder="Endereço da loja" value="{{old('mobile_phone')}}">
            @error('Endereco')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror            
        </div>

        
        

        <div class="form-group">
            <label for="">Fotos de logo</label>
            <input type="file" name="logo"  class="border border-info form-control @error('logo') is-invalid @enderror" >
            @error('logo') 
                <div class="invalid-feedback">
                    {{$message}}
                </div>    
            @enderror
        </div>
       
        <div class="form-group">
            <button class="btn btn-lg btn-primary mt-2"type="submit">Criar Lojas</button>
        </div>

    </form>
@endsection
