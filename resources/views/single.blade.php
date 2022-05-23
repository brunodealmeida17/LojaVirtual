@extends('layouts.front')


@section('content')
<div class="row mt-4">
    <div class="col-6">
    @if($product->photos->count())
        <img src="{{asset('storage/' . $product->photos->first()->image)}}" alt="" class="card-img-top w-90 " >
        <div class="row">
            @foreach($product->photos as $photo)
            <div class="col-3">
            <img src="{{asset('storage/' . $photo->image )}}" alt="" class="img-fluid mt-2">
            </div>
            @endforeach
        </div>
    @else
        <img src="{{ asset('imagens/no-photo.jpg') }} " alt="" class="card-img-top">               
    @endif 
    </div>
        <div class="col-6">
            <div class="col-md-12">
                <h2>{{$product->name}}</h2>
                <p>
                {{$product->description}}
                </p>
                <h3>
                <b> R$: </b> {{number_format($product->price, '2', ',', '.')}}
                </h3>
                <span>
                    fornecido por: {{$product->store->name}}
                </span>
            </div>
            <div class="product-add col-md-12">
                <hr>
                <form action="{{route('cart.add')}}" method="POST">
                    @csrf
                    <input type="hidden" name="product[name]" value="{{$product->name}}"> 
                    <input type="hidden" name="product[price]" value="{{$product->price}}">
                    <input type="hidden" name="product[slug]" value="{{$product->slug}}">

                    <div class="form-group">
                        <label >Quantidade</label>
                        <input min='0' type="number" name="product[amount]" class="form-control col-md-2" value="1">
                    </div>
                   <Button class="btn btn-lg btn-success">Comprar</Button>
                </form>
            </div>
            
        </div>
    </div>


<div class="row">
   <div class="col-12 mb-6">
       <hr>
   {{$product->body}}
   </div>
</div>

@endsection
