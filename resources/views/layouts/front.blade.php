<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Lojas-online</title>
    <style>
        .front.row{
            margin-bottom: 40px;
        }
    </style>
    @yield('stylesheets')


</head>
<body>
    <nav class="navbar navbar-expand-lg navStyle " style="color: black;">
        <a class="brand-navbar" href="{{route('home')}}"><img src="{{ asset('imagens/logo.png') }}" alt="Responsive image" height="30px"></a>
          
        <button class="navbar-toggler" data-toggle="collapse" data-target="#mainMenu">
            <span><i class="fas fa-align-right iconStyle"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="mainMenu">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if(request()->is('/')) active @endif">
                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
            </li>

            @foreach ($categories as $category)

                <li class="nav-item @if(request()->is('/ {{$category->name}}')) active @endif">
                     <a class="nav-link" href="{{route('category.single', ['slug' => $category->slug])}}"> {{$category->name}} </a>
                </li>
                
            @endforeach


        </ul>                       
        <div class="my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">                    
                <li class="nav-item">
                    <a href="{{route('cart.index')}}" class="nav-link">
                        @if(session()->has('cart'))
                        <span class="badge badge-danger">{{count(session()->get('cart'))}}</span>
                        @endif
                        <i class="fas fa-shopping-cart fa-2x"></i>
                        
                    </a>
                </li>
            </ul>
            </div>           
        </div>
    </nav>

<!-- ======================================carousel================================================= -->
    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>   


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    @yield('scripts')
</body>
</html>