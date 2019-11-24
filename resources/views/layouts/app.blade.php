<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="author" content="AM">
        <meta name="description" content="Przepisy zależne od zawartości Twojej lodówki">
        <meta name="keywords" content="przepisy, sezonowe, składniki, kalkulator, kalorie">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <title>W mojej lodówce - @yield('title')</title>
    </head>
    <body>
        @section('nav')
            <nav class="nav">                              
                    <div class="nav-item"><img src="{{ asset('/images/lodowka.png')}}" alt="logo"></div>
                    <div class="nav-item"><a href="{{ route('home') }}">Przepisy</a></div>
                    <div class="nav-item"><a href="{{ route('calendar') }}">Kalendarz sezonowy</a></div>
                    <div class="nav-item"><a href="{{ route('home') }}">Przelicznik wagi</a></div>
                    <div class="nav-item"><a href="{{ route('home') }}">Konserwanty</a></div>
                    <div class="nav-item"><a href="{{ route('home') }}">Licznik kalorii</a></div>                
            </nav>
        @show

        <div class="container">
            @yield('pageTitle')
        </div>

        <div class="container">           
            @yield('content')
        </div>
    </body>
</html>