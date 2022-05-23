@extends('layouts.front')


@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="mt-4"><i class="fas fa-shopping-cart"></i> <b>Carrinho de Compras</b> </h2>
            <hr>            
        </div>
        <div class="col-12">        
           @if($cart)
           
           <table class="table table-striped mt-6">
                <thead class="mt-2">
                    <tr>
                        <th>Produto</th>
                        <th>Valor</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                        <th>Acões</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp

                    @foreach($cart as $c)
                    <tr>
                        
                        <td>{{$c['name']}}</td>
                        <td><b>R$: </b>{{number_format($c['price'], 2, ',', '.')}}</td>
                        <td>{{$c['amount']}}</td>
                        @php
                            $subtotal = $c['price'] * $c['amount'];
                            $total += $subtotal;
                        @endphp


                        <td><b>R$: </b>{{number_format($subtotal, 2, ',', '.')}}</td>
                        <td>
                            <a href="{{route('cart.remove', ['slug' => $c['slug']])}}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </th>
                    @endforeach
                    <tr>
                        <td colspan="3">Total</td>
                        <td colspan="2"><b>R$: </b>{{number_format($total, 2, ',', '.')}}</td>
                    </tr>

                </tbody>
            </table>
            <hr>
                <div class="col-12">
                    <a href="{{route('checkout.index')}}" class="btn btn-success btn-lg float-right">Concluir compra</a>
                    <a href="{{route('cart.cancel')}}" class="btn btn-danger btn-lg float-left">Cancelar compra</a>
                </div>

            @else
                <div class="alert alert-warning">Carrinho vazio...</div>
            @endif
        </div>
    </div>


@endsection