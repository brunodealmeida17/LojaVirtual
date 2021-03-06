@extends('layouts.front')


@section('content')
   <div class="row front mt-4">
        @foreach ($products as $key => $product)
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
   </div>


  {{--  <div class="row">
       
        <div class="col-12">
             <hr>
            <h2>Lojas em Destaque</h2>
            <hr>
        </div>
        @foreach ($stores as $store)    
        <div class="col-4">
            @if($store->logo)            
                <img src="{{asset('storage/' . $store->logo)}}" alt="Logo da Loja {{$store->name}}" class="img-fluid" style="width:10, height:10">
            @else
                 <img src="https://via.placeholder.com/600X300.png?text=logo" alt="Loja sem logo" class="img-fluid" style="width:10, height:10">
            @endif
            <h3>{{$store->name}}</h3>
            <p>{{$store->description}}</p>
        </div>
        @endforeach
   </div> --}}

@endsection
