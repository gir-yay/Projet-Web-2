<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Inscription</title>
</head>

<body>

    <!-- header start -->
    <header class="header">
        <nav class="nav container">
            <div class="nav__data">
                <a href="#" class="nav__logo">
                    <i class="ri-open-arm-fill"></i> Koun Hany!
                </a>

                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-line nav__burger"></i>
                    <i class="ri-close-line nav__close"></i>
                </div>
            </div>

             <!--=============== NAV MENU ===============-->
             <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li><a href="{{ route('home') }}" class="nav__link">Home</a></li>

                    <li><a href="{{ route('home') }}/#about" class="nav__link">About Us</a></li>

                    <!--=============== DROPDOWN 1 ===============-->

                    <li class="dropdown__item">
                        <div class="nav__link">
                            <a href="{{ route('services') }}/#service" class="dropdown__link">
                                Services
                            </a> <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                        <ul class="dropdown__menu">
                            <li>
                                <a href="{{ route('catFiltre', ['cat' => 1]) }}" class="dropdown__link">
                                    <i class="ri-home-3-line"></i> Ménage
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('catFiltre', ['cat' => 2]) }}" class="dropdown__link">
                                    <i class="ri-parent-line"></i> BabySitter
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('catFiltre', ['cat' => 3]) }}" class="dropdown__link">
                                    <i class="ri-restaurant-line"></i> Cuisine
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li><a href="{{ route('home') }}/#contact" class="nav__link">Contact Us</a></li>
                    <li><a href="{{ route('login') }}" class="nav__link">Login</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- header end -->
    <section class="sidee">
        <img src="images/welcome.png" alt="">
    </section>

    <section class="main">
        <div class="container">
            <p class="title">Sign Up</p>
            <div class="separator"></div>
            <p class="welcome-message">S'inscrire comme :</p>
            <button><a href="{{ route('sdk_client') }}">Client</a></button><br>
            <button><a href="{{ route('sdk_expert') }}">Partenaire</a></button>

        </div>
    </section>
    <script src="Js/main.js"></script>
</body>

</html>
