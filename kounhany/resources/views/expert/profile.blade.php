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
    <!-- toastr css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <title>Profile</title>
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
            <li  class="active">
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
            <li>
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
                            <a class="active" href="#">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="box-info">
                <div class="section-body my-4 container-fluid">
                    <h4 class="section-title">Bonjour,
                        {{ auth('expert')->user()->nom . ' ' . auth('expert')->user()->prenom }} !</h4>
                    <div class="row mt-sm-4">
                        <div class="col-12 col-md-12 col-lg-7 mb-5">
                            <div class="card">
                                <form method="post" action="{{ route('expert.profile.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-header">
                                        <h5>Modifier le profil</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="nom">Nom</label>
                                                <input type="text" name="nom" id="nom" placeholder="Nom"
                                                    class="form-control shadow-none"
                                                    value="{{ auth('expert')->user()->nom }}">
                                            </div>
                                            <div class="col-md-6 col-12 mb-2">
                                                <label for="prenom">Prénom</label>
                                                <input type="text" name="prenom" id="prenom" placeholder="Prénom"
                                                    class="form-control shadow-none"
                                                    value="{{ auth('expert')->user()->prenom }}">
                                            </div>
                                            <div class="col-md-6 col-12 mb-2">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email"
                                                    placeholder="Email" class="form-control shadow-none"
                                                    value="{{ auth('expert')->user()->email }}">
                                            </div>
                                            <div class="col-md-6 col-12 mb-2">
                                                <label for="photo">Photo</label>
                                                <input type="file" name="photo" id="photo"
                                                    class="form-control shadow-none">
                                            </div>
                                            <div class="col-md-12 col-12 mb-2">
                                                <label for="bio">Bio</label>
                                                <textarea name="bio" id="bio" placeholder="Bio" class="form-control shadow-none">{{ auth('expert')->user()->bio }}</textarea>
                                            </div>
                                            <div class="col-md-12 col-12 mb-2">
                                                <label for="metier">Profession</label>
                                                <input type="text" name="metier" id="metier"
                                                    placeholder="Profession" class="form-control shadow-none"
                                                    value="{{ auth('expert')->user()->metier }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">Enregistrer les
                                            modifications</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-7">
                            <div class="card">
                                <form method="post" action="{{ route('expert.password.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-header">
                                        <h5>Modifier le mot de passe</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-12 mb-2">
                                                <label for="current_password">Mot de passe actuel</label>
                                                <input type="password" name="current_password" id="current_password"
                                                    placeholder="Mot de passe actuel"
                                                    class="form-control shadow-none">
                                            </div>
                                            <div class="col-md-6 col-12 mb-2">
                                                <label for="password">Nouveau mot de passe</label>
                                                <input type="password" name="password" id="password"
                                                    placeholder="Nouveau mot de passe"
                                                    class="form-control shadow-none">
                                            </div>
                                            <div class="col-md-6 col-12 mb-2">
                                                <label for="password_confirmation">Confirmez le mot de passe</label>
                                                <input type="password" name="password_confirmation"
                                                    id="password_confirmation" placeholder="Confirmez le mot de passe"
                                                    class="form-control shadow-none">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary">Enregistrer les
                                            modifications</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



            </div>



        </main>
        <!-- MAIN -->
    </section>


    <script src="{{ asset('js/expertJS/script.js') }}"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- toastr js -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error('{{ $error }}', 'Erreur', {
                    "positionClass": "toast-top-right",
                    "progressBar": true
                });
            @endforeach
        @endif
    </script>

</body>

</html>
