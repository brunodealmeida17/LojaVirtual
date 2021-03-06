@extends('layouts.front')


@section('content')
    <div class="row front mt-4">
        <h2>{{$category->name}}</h2>
    </div>
    <hr>


   <div class="row front mt-4">
       @if($category->products->count())
             @foreach ($category->products as $key => $product)
                        <div class="col-md-4">
                        <div class="card" style="width: 98%;">
                            @if($product->photos->count())
                                <img src="{{asset('storage/' . $product->photos->first()->image)}}" alt="" class="card-img-top">
                            @else
                                <img src="{{ asset('imagens/no-photo.jpg') }} " alt="" class="card-img-top">
                            
                            @endif       
                            <div class="card-body">
                                <h2 class="card-title">{{$product->name}}</h2>
                                <p class="card-text">{{$product->description}}</p>
                                <h3> <b> R$: </b> {{number_format($product->price, '2', ',', '.')}}</h3>
                                <a href="{{route('product.single', ['slug' => $product->slug])}}" class="btn btn-success">
                                    VER PRODUTO
                                </a>
                            </div>
                        </div>
                        </div>
                @if(($key + 1) % 3 == 0) </div><div class="row front">@endif
            @endforeach
       @else
        <h3 class="alert alert-warning">Nenhum produto encontrado para essa categoria!</h3>
       @endif
    
   </div>


 
@endsection
