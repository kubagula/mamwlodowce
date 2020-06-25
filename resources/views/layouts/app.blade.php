<html>

<head>
    <meta charset="utf-8">
    <meta name="author" content="AM">
    <meta name="description" content="Przepisy zależne od zawartości Twojej lodówki">
    <meta name="keywords" content="przepisy, sezonowe, składniki, kalkulator, kalorie">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rwd.css') }}">
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/scripts.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
    <title>W mojej lodówce - @yield('title')</title>
</head>

<body>
    <div class="container">
        @section('nav')
        <header class="header {{ (request()->is('/')) ? 'header-full' : '' }}">
            <div class="menu">
                <a href="{{ route('home') }}" class="logo"></a>

                <div id="menuToggle">
                    <!--
                            A fake / hidden checkbox is used as click reciever,
                            so you can use the :checked selector on it.
                            -->
                    <input type="checkbox" />

                    <!--
                            Some spans to act as a hamburger.
                            
                            They are acting like a real hamburger,
                            not that McDonalds stuff.
                            -->
                    <span></span>
                    <span></span>
                    <span></span>

                    <!--
                            Too bad the menu has to be inside of the button
                            but hey, it's pure CSS magic.
                            -->
                    <ul id="menuList">
                        <li class="nav-item"><a href="{{ route('recipes') }}" class="nav-item {{ (request()->is('przepisy*')) ? 'active' : '' }}">Przepisy</a></li>
                        <li class="nav-item"><a href="{{ route('calendar') }}" class="nav-item {{ (request()->is('kalendarz-sezonowy')) ? 'active' : '' }}">Kalendarz sezonowy</a></li>
                        <li class="nav-item"><a href="{{ route('preservatives') }}" class="nav-item {{ (request()->is('sztuczne-dodatki')) ? 'active' : '' }}">Sztuczne dodatki</a></li>
                    </ul>
                </div>

                <!-- <nav>
                            Navigation burger
                            <div id="burger" class="burger">
                              <div></div>
                              <div></div>
                              <div></div>
                            </div>                            
                            <ul id="menuList">
                                <li class="nav-item"><a href="{{ route('recipes') }}" class="nav-item {{ (request()->is('przepisy*')) ? 'active' : '' }}">Przepisy</a></li>
                                <li class="nav-item"><a href="{{ route('calendar') }}" class="nav-item {{ (request()->is('kalendarz-sezonowy')) ? 'active' : '' }}">Kalendarz sezonowy</a></li>
                                <li class="nav-item"><a href="{{ route('preservatives') }}" class="nav-item {{ (request()->is('sztuczne-dodatki')) ? 'active' : '' }}">Sztuczne dodatki</a></li>                           
                            </ul>

                        </nav> -->

                <!-- <div class="nav">
                            <div class="nav-item"><a href="{{ route('recipes') }}" class="nav-item {{ (request()->is('przepisy*')) ? 'active' : '' }}">Przepisy</a></div>
                            <div class="nav-item"><a href="{{ route('calendar') }}" class="nav-item {{ (request()->is('kalendarz-sezonowy')) ? 'active' : '' }}">Kalendarz sezonowy</a></div>
                            <div class="nav-item"><a href="{{ route('home') }}" class="nav-item">Przelicznik wagi</a></div>
                            <div class="nav-item"><a href="{{ route('preservatives') }}" class="nav-item {{ (request()->is('sztuczne-dodatki')) ? 'active' : '' }}">Sztuczne dodatki</a></div>
                            <div class="nav-item"><a href="{{ route('home') }}" class="nav-item">Licznik kalorii</a></div>               
                        </div> -->
            </div>
        </header>
        @show

        <section class="main">
            <div class="pageTitle">
                @yield('pageTitle')
            </div>

            <div class="content">
                @yield('content')
            </div>
        </section>
        <section id="cookie-warn">
            <p><strong>UWAGA!</strong> Niniejsza strona wykorzystuje pliki cookies.
                Informacje uzyskane za pomocą cookies wykorzystywane są głównie
                w celach statystycznych. Pozostając na stronie godzisz się na
                ich zapisywanie w Twojej przeglądarce. &nbsp;
                <a href="https://policies.google.com/technologies/cookies?hl=pl" target="_blank">Więcej informacji</a>
                <a href="javascript:void(0);" id="close-cookie-warn">OK</a></p>
        </section>
    </div>

    <footer class="footer">
        <p class="copy">Copyright © 2020 mamwlodówce | <a href="{{ route('kontakt') }}" class="contactLink">Kontakt</a>
        </p>
    </footer>
</body>

</html>