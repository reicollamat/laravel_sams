<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    {{-- icon --}}
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('img/icon.svg') }}">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome-6-2-1/all.min.css') }}" type="text/css">
</head>

<body class="antialiased">
    @if(Session::has('message'))
    <script>
        alert("{{ Session::get('message') }}");
    </script>
    @endif
    <!-- General navbar -->
    <header>
        <!-- Navigation bar -->
        <nav class="navbar  navbar-expand-lg navbar-dark fs-5 border-bottom border-secondary glass ">
            <div class="container-fluid d-flex ">
                <a class="navbar-brand" href="{{ '/' }}">
                    <img src="{{ URL::asset('img/icon.svg') }}" alt="logo" width="40" height="40"
                        class="d-inline-block align-top" />
                    SAMS
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-evenly" id="navbarNavDropdown">
                    <ul class="navbar-nav mb-2 ps-4">
                        {{--
                        <!-- Main page navigator section -->
                        <!-- it is needed, for highlighting current page --> --}}
                        <li class="nav-item ">
                            <a class="nav-link" aria-current="page" href="{{ '/' }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>

                        <!-- Account navigator section -->

                        <li class="nav-item dropdown right-edge ">
                            @if (Route::has('login'))
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" aria-current="page">
                                <p>Account</p>
                            </a>

                            <ul class="dropdown-menu text-center"
                                style="background-color:rgba(0, 0, 0, 0.200)!important">
                                @auth
                                <li><a class="dropdown-item" href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                @else
                                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                @if (Route::has('register'))
                                <li>
                                    <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                                </li>
                                @endif
                                @endauth
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- 1st home page showcase section -->
    <section class="text-light p-3 text-sm-start d-flex align-items-center justify-content-center sec-1">
        <div class="container-lg" style="z-index:9999;">
            <div class="row justify-content-center align-items-center align-self-center">
                <!-- gif display -->
                <div class="col-md-5 text-center d-none d-md-block ">
                    <video muted autoplay width="100%" height="100%" loop>
                        <source autoplay src="{{ asset('img/protectionicon.webm') }} ">
                    </video>
                    <!-- <img class="img-fluid" src="{% static 'img/protectionicon.gif' %}" alt=""> -->
                </div>
                <!-- text display -->
                <div class="col-md-7 text-center text-md-start">
                    <h1 class="user-select-none">
                        <div class="display-3">Security<span class="text-primary"> Agency</span><span
                                class="text-primary"> Mangement</span> System</div>
                        <div class="display-6">Your <span class="text-primary">Security</span> Partner</div>
                    </h1>
                    <p class="lead my-4 user-select-none">It is designed to effectively organize the security guard
                        industry that would be highly beneficial for any private patrol company or security agency.</p>
                    <a href="#" class="btn btn-primary btn-lg shadow-lg">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <!-- 2nd home page showcase section -->
    <section class="bg-dark text-light text-sm-start d-flex align-items-center justify-content-center p-3" id="sec_2">
        <div class="container-lg">
            <div class="row justify-content-center align-items-center">

                <!-- text display -->
                <div class="col-md-7 text-center text-md-end">
                    <h1>
                        <div class="display-4">Contract Security <span class="text-primary">Guards</span></div>
                        <div class="display-6">Your Security Is Our <span class="text-primary">Priority</span></div>
                    </h1>
                    <p class="lead my-4">Delivering an efficient and seamless security guard management solution leading
                        to
                        improved operational efficiency, such as managing schedules and reports, guards, and clients.
                    </p>
                </div>
                <!-- gif display -->
                <div class="col-md-5 text-center d-none d-md-block">
                    <video muted autoplay width="100%" height="100%" loop>
                        <source autoplay src="{{ asset('img/contract.webm') }}">
                    </video>

                </div>
    </section>
    <!-- Footer -->
    <footer class="border-top border-white">
        <!-- Container-->
        <div class="container-lg">
            <!-- Section: Social media -->
            <section class="no-section d-flex justify-content-between p-4 bg-dark">
                <!-- Left -->
                <div class="me-5">
                    <span class="text-white">Get connected with us on social networks:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a href="#" class="text-decoration-none text-white me-4">
                        <i class="fa-brands fa-square-facebook fa-xl"></i>
                    </a>
                    <a href="#" class="text-decoration-none text-white me-4">
                        <i class="fab fa-twitter fa-xl"></i>
                    </a>
                    <a href="#" class="text-decoration-none text-white me-4">
                        <i class="fab fa-google fa-xl"></i>
                    </a>
                    <a href="#" class="text-decoration-none text-white me-4">
                        <i class="fab fa-instagram fa-xl"></i>
                    </a>
                    <a href="#" class="text-decoration-none text-white me-4">
                        <i class="fab fa-linkedin fa-xl"></i>
                    </a>
                    <a href="#" class="text-decoration-none text-white me-4">
                        <i class="fab fa-github fa-xl"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Links  -->
            <section class="no-section ">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase text-white fw-bold">SAMS</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #0d6efd; height: 2px" />
                            <p class="text-white">
                                Start-up company offering secure and efficient services
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase text-white fw-bold">Products</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #0d6efd; height: 2px" />
                            <p>
                                <a href="#!" class="text-white">Bootstrap</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">FontAwesome</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Github</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Opensource Project</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase text-white fw-bold">Useful links</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #0d6efd; height: 2px" />
                            <p>
                                <a href="#!" class="text-white">Your Account</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Become an Affiliate</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Shipping Rates</a>
                            </p>
                            <p>
                                <a href="#!" class="text-white">Help</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase text-white fw-bold">Contact</h6>
                            <hr class="mb-4 mt-0 d-inline-block mx-auto"
                                style="width: 60px; background-color: #0d6efd; height: 2px" />
                            <p class="text-white"><i class="fas fa-home mr-3"></i> Quezon City, Philippines</p>
                            <p class="text-white"><i class="fas fa-envelope mr-3"></i> securityagency@db.com</p>
                            <p class="text-white"><i class="fa-solid fa-phone mr-3"></i> + 01 234 567 88</p>
                            <p class="text-white"><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2022 Copyright:
                <a class="text-white" href="#">SMD</a>
            </div>
            <!-- Copyright -->
        </div>
        <!-- Container-->
    </footer>


    {{-- js script --}}
    <script src="{{ URL::asset('bootstrap/js/bootstrap.bundle.min.js') }}" async></script>
    <script src="{{ URL::asset('js/main.js') }}" async></script>

</body>

</html>