<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Mon Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

    <!--=============== SWIPER CSS ===============-->
    <!--<link rel="stylesheet" href="{{ asset('css/client/swiper-bundle.min.css') }}">-->
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/ourclient.css') }}">
    <style>

    
    button {
    padding: 8px 16px;
    background-color: darkblue;
    color: white;
    border: 1px solid darkblue;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
    font-size: 14px;
    
    }

    body {
       
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /*background-color: #f4f4f4;*/
    }
    a {
        text-decoration: none;
        
    }
    a:hover {
        text-decoration: none;
    }
    

    </style>

</head>

<body>

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
            <li class="active">
                <a href="{{ route('client.profile') }}">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Mon Profile</span>
                </a>
            </li>
             <li>
                <a href="{{ route('services') }}">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Services</span>
                </a>
            </li>
            <li >
                <a href="{{ route('client.demande_client') }}">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Mes demandes</span>
                </a>
            </li>
            <li>
                <a href="{{route('client.avis.index')}}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Mes commentaires</span>
                </a>
            </li>


            <li>
                <a href="#" class="logout" >
                    <i class='bx bxs-log-out-circle'></i>
                    <form action="{{ route('client.logout') }}" method="Post" >
                        @csrf
                        <button class="logout-btn" style="padding:0px;">Deconnexion</button>
                    </form>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content" >
        <!-- NAVBAR -->
        <nav >
            <i class='bx bx-menu'></i>
            <form action="#">
                <div class="form-input">
                    <!--
                    <input type="search" placeholder="Recherche...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
-->
                </div>
            </form>
            <!--
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
-->

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
                            <a class="active" href="#">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>

    <section class="section about-section" id="about">
        @if (session('success'))
                <div class="alert alert-success text-center"
                    style=" border-color: #c3e6cb; color: #155724;text-align:center;margin-bottom:5px">
                    {{ session('success') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger text-center"
                    style=" border-color: #f5c6cb; color: #721c24;text-align:center; margin-bottom:5px">
                    {{ session('error') }}
                </div>
            @endif
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-8">
                    <div class="about-text go-to">
                        <h3 class="dark-color">Profile</h3>
                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Nom</label>
                                    <p>{{ $user->nom }}</p>
                                </div>
                                <div class="media">
                                    <label>Prenom</label>
                                    <p>{{ $user->prenom }}</p>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <label>E-mail</label>
                                    <p>{{ $user->email }}</p>
                                </div>
                                <div class="media">
                                    <label>Phone</label>
                                    <p>{{ $user->phone }}</p>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <br><br><br>
                    <form action="">
                        @csrf
                        <div class="button-container">
                        <button><a  style="color: aliceblue;" href="{{route("client.sdk_edit_client",$user)}}">Modifier</a></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3">
                    <div class="about-avatar">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title alt>
                    </div>
                </div>
            </div>
        
        </div>
    </section>
            </section>

        </main>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>

     <!-- CONTENT -->
        <script src="{{ asset('js/clientJS/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('js/clientJS/main.js') }}"></script>
        <script src="{{ asset('js/clientJS/script.js') }}"></script>
</body>

</html>
