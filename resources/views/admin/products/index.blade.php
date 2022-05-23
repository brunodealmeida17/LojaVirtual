@extends('layouts.app')

@section('content')

<h1>Lista de Produtos</h1>

<a href="{{route('admin.products.create')}}" class="btn btn-success">Novo produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Loja</th>
                <th>Ações</th>                                 
            </tr>
        </thead>
        <TBody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>R$: {{number_format($product->price, 2, ',', '.') }}</td>
                    <td>{{$product->store->name }}</td>
                    <td>
                    <div class="btn-group">
                        <a href="{{route('admin.products.edit', ['product' => $product->id])}}" class="btn btn-sm btn-success"><i class="fas fa-pencil-alt"></i></a></a>                        
                        <form action="{{route('admin.products.destroy', ['product' => $product->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-times"></i></a></button>
                        </form>
                    </div> 
                    </td>                
                </tr>
            @endforeach
        </TBody>            
    </table>   

    {{$products->links()}}
@endsection