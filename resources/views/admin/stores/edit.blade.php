@extends('layouts.app')

@section('content')
    <h1>Editar Produto</h1>

    <form class="col-md-6" method="post" action="{{action('admin\\StoreController@update', $store->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">            
            <input class="form-control mt-2"type="text" name="name" placeholder="Nome da Loja" value="{{$store->name}}">
        </div>

        <div class="form-group">            
            <input class="form-control mt-2"type="text" name="description" placeholder="Descrição" value="{{$store->description}}">
        </div>

        <div class="form-group">            
            <input class="form-control mt-2"type="text" name="phone" placeholder="Telefone" value="{{$store->phone}}">
        </div>

        <div class="form-group">            
            <input class="form-control mt-2 " type="text" name="mobile_phone" placeholder="Celular/WhatsApp" value="{{$store->mobile_phone}}">
        </div>

        <div class="form-group">
            <p>
                <img src="{{asset('storage/' . $store->logo)}}" alt="" class="border border-info rounded-circle" style="width:20%; height: 20%">
            </p>

            <label for="">Fotos da logo</label>
            <input type="file" name="logo"  class="form-control @error('logo') is-invalid @enderror" >
            @error('logo') 
                <div class="invalid-feedback">
                    {{$message}}
                </div>    
            @enderror
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-primary mt-2"type="submit">Atualizar Lojas</button>
        </div>

    </form>
@endsection
