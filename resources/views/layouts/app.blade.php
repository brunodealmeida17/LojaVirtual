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
</head>
<body>
    <nav class="navbar navbar-expand-lg navStyle " style="color: black;">
        <a class="brand-navbar" href="{{route('home')}}"><img src="{{ asset('imagens/logo.png') }}" alt="Responsive image" height="60px"></a>
          
        <button class="navbar-toggler" data-toggle="collapse" data-target="#mainMenu">
            <span><i class="fas fa-align-right iconStyle"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav ml-auto navList">
                <li class="nav-item @if(request()->is('/home')) active @endif"><a href="{{route('home')}}" class="nav-link "><i class="fas fa-home"></i>HOME<span class="sr-only">(current)</span></a>
            </li>
                <li class="nav-item @if(request()->is('admin/products*')) active @endif">
                    <a href="{{route('admin.products.index')}}" class="nav-link"><i class="fab fa-product-hunt"></i>Produtos</a>
                </li>
                <li class="nav-item  @if(request()->is('admin/stores*')) active @endif">
                    <a href="{{route('admin.stores.index')}}" class="nav-link"><i class="fas fa-store"></i>Lojas</a>
                </li>
                <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
                    <a href="{{route('admin.categories.index')}}" class="nav-link"><i class="fas fa-cubes"></i>Categorias</a>
                </li>                
                <div class="my-2 my-lg-0"> 
                    <ul>               
                    <li ><a href="#" class="nav-link" onclick="event.preventDefault(); document.querySelector('form.logout').submit();"><i class="fas fa-sign-out-alt"></i>sair</a>
                    <form action="{{route('logout')}}" class="logout" method="post">@csrf</form>     
                    </li>                  
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
</body>
</html>