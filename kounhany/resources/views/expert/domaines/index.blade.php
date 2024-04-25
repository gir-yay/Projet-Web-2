<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS, JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/expert/dashexpert.css') }}">
    <title>Domaines</title>
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
                <a href="{{ route('expert.demandes.index') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Mes demandes</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('expert.domaines.index') }}" class="domaines">
                    <i class="fa-brands fa-servicestack"></i>
                    <span class="text">Mes domaines</span>
                </a>
            </li>
            <li>
                <a href="{{ route('expert.avis.index') }}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Avis</span>
                </a>
            </li>
            <li>
                <a href="{{ route('expert.payment.index') }}">
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
                            <a class="active" href="#">Domaines</a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="">
                <a href="{{ route('expert.domaines.create') }}" class="ajouter btn btn-primary mb-5 {{$countActive == 3 ? "disabled" : ""}} " >Ajouter</a>
                <div class="row g-3 domaines">
                    @foreach ($domaines as $domaine)
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-body row">
                                    <div class="col-12 col-md-6">
                                        <p><span>Service: </span> {{ $domaine->service->nom }}</p>
                                        <p><span>Nombre d'années d'expérience:</span> {{ $domaine->nbr_annee_d_exp }}
                                        </p>
                                        <p><span>Ville:</span> {{ $domaine->ville }}</p>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <p><span>Prix par jour:</span> ${{ $domaine->prix_par_duree }}</p>
                                        <p><span>Statut:</span> <span
                                                class="badge p-2 {{ $domaine->status_ == 'active' ? 'bg-success' : 'bg-danger' }}">{{ $domaine->status_ }}</span>
                                        </p>
                                    </div>
                                    <div>
                                        <span>Description:</span>
                                        <p class="description">{{ $domaine->disponibilite }}</p>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-end gap-3 mt-3">
                                        <a class="btn btn-info"
                                            href="{{ route('expert.domaines.edit',['id' => $domaine->id]) }}"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <form method="POST"
                                            action="{{ route('expert.domaines.switch', ['id' => $domaine->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-warning"><i
                                                    class="fa-solid fa-repeat"></i></button>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>

            </div>



        </main>
        <!-- MAIN -->
    </section>


    <script src="{{ asset('js/expertJS/script.js') }}"></script>
</body>

</html>
