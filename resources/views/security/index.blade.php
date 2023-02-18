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
    {{-- <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    @vite(['public/css/main.css', 'public/js/main.js'])
</head>

<body class="antialiased">
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
                <?php
                use Carbon\Carbon;
                ?>
                <p class="m-0 text-white fs-6 ">{{ $c_datetime }}</p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav mb-0 ps-4">
                        <!-- Main page navigator section -->
                        @if (Route::has('login'))
                            @auth
                                @if (auth()->user()->is_admin)
                                    <li class="nav-item ">
                                        <a class="nav-link fs-6" aria-current="page"
                                            href="{{ url('/admindashboard') }}">Admin Dashboard</a>
                                    </li>
                                @else
                                    <li class="nav-item ">

                                        <a class="nav-link fs-6" aria-current="page" href="{{ url('/userdashboard') }}">User
                                            Dashboard</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item">
                                    <a class="nav-link fs-6" href="{{ route('login') }}">Login</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link fs-6" href="{{ route('register') }}">Register</a>
                                    </li>
                                @endif
                            @endauth
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
                        <source autoplay src="../../img/protectionicon.webm">
                    </video>
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
                    @auth
                        @if (auth()->user()->is_admin)
                        <a href="{{ route('admindashboard') }}" class="btn btn-primary btn-lg shadow-lg">Get Started</a>
                        @else
                        <a href="{{ route('userdashboard') }}" class="btn btn-primary btn-lg shadow-lg">Get Started</a>
                        @endif
                    @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg shadow-lg">Get Started</a>
                    @endauth
                    
                    
                        
                    
                    
                    
                        
                </div>
            </div>
        </div>
    </section>

    <!-- 2nd home page showcase section -->
    <section class="bg-dark text-light text-sm-start d-flex align-items-center justify-content-center p-3"
        id="sec_2">
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
        <div class="container-expand-lg">
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
                            <p class="text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-building" viewBox="0 0 16 16">
                                    <path
                                        d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                                    <path
                                        d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1Zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3V1Z" />
                                </svg> Quezon City, Philippines
                            </p>
                            <p class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-envelope-at-fill"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z" />
                                    <path
                                        d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z" />
                                </svg> securityagency@db.com</p>
                            <p class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-telephone-fill"
                                    viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg> + 01 234 567 88</p>
                            
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
    {{-- <script src="{{ URL::asset('bootstrap/js/bootstrap.bundle.min.js') }}" async></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>

</html>
