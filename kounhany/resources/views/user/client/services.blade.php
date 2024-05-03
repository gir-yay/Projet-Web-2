<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nos services </title>
    <link rel="stylesheet" href="{{ asset('css/services/product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/services/stellarnav.css') }}">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

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
                    <li><a href="#" class="nav__link">Home</a></li>

                    <li><a href="#about" class="nav__link">About Us</a></li>

                    <li><a href="#service" class="nav__link">Services</a></li>
                    <li><a href="#contact" class="nav__link">Contact Us</a></li>
                    @if (auth()->check())
                        <li>
                            <a href="{{ route('client.logout') }}" style="color:white !important" class="nav__link">
                                <form action="{{ route('client.logout') }}" method="POST">
                                    @csrf
                                    <button class="nav__link"
                                        style="border:none; background:none;color:white; font-size:16px; font-weight600">Se
                                        Déconnecter</button>
                                </form>
                            </a>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}" class="nav__link">Login</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>


    <section class="offers">
        <div class="container">
            <h4>Nos services </h4>
        </div>
    </section>

    <section class="mt-3 filter">
        <div class="container filter">
            <div class="cap">
                <h4>FILTER</h4>
            </div>
        </div>
    </section>

    <section class="mt-3">
        <div class="container product-selection">
            <div class="select">
                <button class="accordion font-weight-bold mb-3"></button>
                <div class="panel">
                    <button class="accordion font-weight-bold mb-3">CATAGORIES</button>
                    <div class="panel">
                        <p><a href="{{ route('catFiltre', '2') }}">Babysitting</a></p>
                        <p><a href="{{ route('catFiltre', '3') }}">Cuisine</a></p>
                        <p><a href="{{ route('catFiltre', '1') }}">Menage</a></p>
                    </div>




                    <button class="accordion font-weight-bold mb-3">Prix</button>
                    <div class="panel">
                        <form action="{{ route('searchByPrice') }}" method="GET">
                            <div class="form-group">
                                <label for="prix">Prix:</label>
                                <input type="number" class="form-control" id="prix" name="prix"
                                    placeholder="Entrez le prix">
                            </div>
                            <button type="submit" class="btn btn-primary">Rechercher</button>
                        </form>
                    </div>

                    <button class="accordion font-weight-bold mb-3">Ville</button>
                    <div class="panel">
                        <form action="{{ route('searchByCity') }}" method="GET">
                            <div class="form-group">
                                <label for="ville">Ville:</label>
                                <input type="text" class="form-control" id="ville" name="ville"
                                    placeholder="Entrez la ville..">
                            </div>
                            <button type="submit" class="btn btn-primary">Rechercher</button>
                        </form>
                    </div>




                    <button class="accordion font-weight-bold mb-3">Note </button>
                    <div class="panel">
                        <form action="{{ route('searchByRating') }}" method="GET">
                            <select name="note">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Rechercher</button>
                        </form>
                    </div>



                    <div class="panel size"></div>
                </div>
            </div>



            <div class="product-view">

                @foreach ($serviceExpert as $serviceExpert)
                    <div class="col-sm-4 col-md-7 col-lg-8">
                        <div class="expert">
                            <a
                                href="{{ route('expert-detail', ['expertId' => $serviceExpert->expert->id, 'serviceId' => $serviceExpert->service_id]) }}">
                                <img src="{{ asset($serviceExpert->expert->photo) }}" alt="">
                                <div class="text">
                                    <h6 class="mt-2">{{ $serviceExpert->expert->nom }}
                                        {{ $serviceExpert->expert->prenom }}</h6>
                                    <h6>{{ $serviceExpert->prix_par_duree }}</h6>
                                    <h7>{{ $serviceExpert->ville }}</h7>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </section>

    <footer class="page-footer font-small indigo mt-5">

        <div class="footer-copyright text-center py-3">© KOUN HANY Copyright:

        </div>


    </footer>





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/servicesJS/stellarnav.js') }}"></script>
    <script src="{{ asset('js/servicesJS/product.js') }}"></script>

</body>

</html>
