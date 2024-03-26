<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DeliveBoo</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div id="app">


        <nav class="navbar navbar-expand-md navbar-light bg-warning shadow">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center justify-content-start" href="{{ url('/') }}">

                    <div class="logo">
                        <img src="/img/logo.png" alt="Deliveboo">
                    </div>
                    <div class="logo_text">
                        <img src="/img/logo_text.png" alt="Deliveboo">
                    </div>

                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">{{ __('Home') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right bg-warning " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"
                                        href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                                    {{-- <a class="dropdown-item" href="{{ url('profile') }}">{{ __('Profile') }}</a> --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="bg_blue_primary">
            @yield('content')
        </main>
    </div>
</body>
<!-- Footer -->
<footer class="text-center text-lg-start bg_footer text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block text-white ">
            <span>Connettiti con noi sui social network:</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div class="text-white ">
            <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5 text-white ">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase text-warning  mb-4 fs-5">
                        <i class="fas fa-gem me-3"></i>Deliveboo S.r.L.
                    </h6>
                    <p>
                        Rendi il tuo business un successo digitale: soluzioni gestionali per la tua delivery,
                        ottimizzando tempi e risorse per massimizzare l'efficienza.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase text-warning mb-4 fs-5">
                        LISTA FOOTER 1
                    </h6>
                    <ul class="list-unstyled ">
                        <li>
                            {{-- <router-link to="/projects" class="text-reset text-decoration-none ">Lista
                                completa</router-link> --}}
                            Elemento1
                        </li>
                        <li>
                            {{-- <router-link to="/technology/html"
                                class="text-reset text-decoration-none ">HTML</router-link> --}}
                            Elemento2
                        </li>

                    </ul>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase text-warning fs-5 mb-4">
                        Link utili
                    </h6>
                    <p>
                        <a href="#!" class="text-reset  text-decoration-none">Chi siamo</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset  text-decoration-none">I nostri servizi</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset  text-decoration-none">Abbonamenti</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset  text-decoration-none">FAQ</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase text-warning mb-4 fs-5">Contatti</h6>
                    <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        info@deliveboo.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> + 21 274 367 81</p>
                    <p><i class="fas fa-print me-3"></i> + 21 274 367 29</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4 open-sans" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2024 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Deliveboo.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

</html>
