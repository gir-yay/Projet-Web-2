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
    <link rel="stylesheet" href="{{ asset('css/client/dashclient.css') }}">
    <!-- Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <title>Avis</title>
</head>

<body>

 <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class="bx ri-open-arm-fill "></i>
            <span class="text">Koun Hany</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="{{ route('client.dashboard') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('client.profile') }}">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Mon Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('client.demande_client') }}">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Mes demandes</span>
                </a>
            </li>
            <li class="active">
                <a href="{{route('client.avis.index')}}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Mes commentaires</span>
                </a>
            </li>


            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <form action="{{ route('client.logout') }}" method="Post">
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

                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                <!--img src="img/people.png"-->
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
                            <a class="active" href="#">Avis</a>
                        </li>
                    </ul>
                </div>
            </div>




            <!-- Slider main container -->
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    @foreach ($comments as $comment)
                        <div class="swiper-slide">
                            <div class="box-area">
                                <div class="img-area">
                                    <img src="{{ asset('images/user.png') }}" alt="">
                                </div>
                                <h5>{{ $comment->expert->nom . ' ' . $comment->expert->prenom }}</h5>
                                <p class="content">
                                    {{ $comment->commentaire }}
                                </p>
                                <div class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $comment->note)
                                            <i class="fa fa-star"></i> <!--  les étoiles remplies -->
                                        @else
                                            <i class="fa-regular fa-star"></i>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>


            </div>



        </main>
        <!-- MAIN -->
    </section>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },



            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            }
        });
    </script>

    <script src="{{ asset('js/expertJS/script.js') }}"></script>


</body>




</html>
