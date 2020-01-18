<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="author" content="AM">
        <meta name="description" content="Przepisy zależne od zawartości Twojej lodówki">
        <meta name="keywords" content="przepisy, sezonowe, składniki, kalkulator, kalorie">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}" defer></script>
        <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">       
        <title>W mojej lodówce - @yield('title')</title>
    </head>
    <body>
        <div class="container">
            @section('nav')
                <div class="header">
                    <div class="nav-item"><a href="{{ route('home') }}"><img src="{{ asset('/images/logo-ze-sloniem.png')}}" alt="logo"></a></div>
                    <nav class="nav">            
                            <!-- <li class="{{ (request()->is('admin/cities')) ? 'active' : '' }}">                                                -->
                            <div class="nav-item"><a href="{{ route('recipes') }}" class="nav-item {{ (request()->is('przepisy*')) ? 'active' : '' }}">Przepisy</a></div>
                            <div class="nav-item"><a href="{{ route('calendar') }}" class="nav-item {{ (request()->is('kalendarz-sezonowy')) ? 'active' : '' }}">Kalendarz sezonowy</a></div>
                            <div class="nav-item"><a href="{{ route('home') }}" class="nav-item">Przelicznik wagi</a></div>
                            <div class="nav-item"><a href="{{ route('home') }}" class="nav-item">Sztuczne dodatki</a></div>
                            <div class="nav-item"><a href="{{ route('home') }}" class="nav-item">Licznik kalorii</a></div>                
                    </nav>
                </div>    
            @show

            <div class="pageTitle">
                @yield('pageTitle')
            </div>

            <div class="content">           
                @yield('content')
            </div>

            <div class="footer">
                
            </div>
        </div>        
    </body>
</html>