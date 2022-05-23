@extends('layouts.app')

@section('content')

<h1>Lista de lojas</h1>
@if(!$store)
<a href="{{route('admin.stores.create')}}" class="btn btn-success">Nova Loja</a>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>LOJAS</th>
                <th>TOTAL DE PRODUTOS</th>
                <th>AÇÕES</th>                               
            </tr>
        </thead>
        <TBody>           
            <tr>
                <td>{{ $store->id }}</td>
                <td>{{ $store->name }}</td>
                <td>{{ $store->products->count()}}</td>
                <div class="form-group">
                <td>   
                <div class="btn-group">
                    <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></a>                            
                    <form action="{{route('admin.stores.destroy', ['store' => $store->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                    </form>                           
                </div> 
                </td>          
            </tr>          
        </TBody>            
    </table>
    @endif  
@endsection