<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/expert/dashexpert.css') }}">
    <title>Dashboard Expert</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class="bx ri-open-arm-fill "></i>
            <span class="text">Koun Hany</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="{{ route('expert.dashboard') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('expert.profile') }}">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Mon Profile</span>
                </a>
            </li>
            <li>
                <a href="{{route('expert.demandes.index')}}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Mes demandes</span>
                </a>
            </li>
            <li>
                <a href="{{route('expert.domaines.index')}}" class="domaines">
                    <i class="fa-brands fa-servicestack"></i>
                    <span class="text">Mes domaines</span>
                </a>
            </li>
            <li>
                <a href="{{route('expert.avis.index')}}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Avis</span>
                </a>
            </li>
            <li>
                <a href="{{route('expert.payment.index')}}">
                    <i class='bx bxs-wallet'></i>
                    <span class="text">Paiement</span>
                </a>
            </li>




            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <form action="{{ route('expert.logout') }}" method="Post">
                        @csrf
                        <button class="logout-btn">Deconnexion</button>
                    </form>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Recherche...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>

            <a href="#" class="profile">
                <img src="{{ asset(auth('expert')->user()->photo) }}">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Home</a>
                        </li>
                    </ul>
                </div>
            </div>


            <ul class="box-info">
                <li>
                    <i class='bx bxs-group'></i>
                    <span class="text">
                        <h4>Total Demandes</h4>
                        <p>{{ $demandes }}</p>
                    </span>
                </li>
                <li>
                    <i class='bx bxs-dollar-circle'></i>
                    <span class="text">
                        <h4>Total Gains</h4>
                        <p>${{ $earnings }}</p>
                    </span>
                </li>
                <li class="review">
                    <i class='bx bxs-calendar-check'></i>
                    <span class="text">
                        <h4>Evaluation</h4>
                        <p>
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < $ratings)
                                    <i class="fa-solid fa-star"></i>
                                @else
                                    <i class="fa-regular fa-star"></i>
                                @endif
                            @endfor
                        </p>
                    </span>
                </li>
                <li class="comment">
                    <i class='bx bxs-chat'></i>
                    <span class="text">
                        <h4>Commentaires</h4>
                        <p>{{ $comments }}</p>
                    </span>
                </li>
                <li class="avis">
                    <i class="fa-solid fa-comment"></i>
                    <span class="text">
                        <h4>Avis</h4>
                        <p>{{ $avis }}</p>
                    </span>
                </li>
                <li class="services">
                    <i class="fa-brands fa-servicestack"></i>
                    <span class="text">
                        <h4>Services</h4>
                        <p>{{ $services }}</p>
                    </span>
                </li>
            </ul>



        </main>
        <!-- MAIN -->
    </section>


    <script src="{{ asset('js/expertJS/script.js') }}"></script>
</body>

</html>
