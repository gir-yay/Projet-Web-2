<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Expert profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

</head>

<body>
    <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse ">
                <div class="col-lg-6">
                    <div class="about-text go-to">
                        <h3 class="dark-color">Profile</h3>
                        <h6 class="theme-color lead">Bio</h6>
                        <p>{{ $user->bio }}</p>
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
                                    <label>Métier</label>
                                    <p>{{ $user->metier }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-avatar">
                        <img src="{{ asset($user->photo) }}" title alt width="50%">
                    </div>
                </div>
            </div>
            <div class="counter">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="500" data-speed="500">2</h6>
                            <p class="m-0px font-w-600">Services</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="150" data-speed="150">4.2</h6>
                            <p class="m-0px font-w-600">Rank</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="850" data-speed="850">10</h6>
                            <p class="m-0px font-w-600">Nombre de commentaires</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="190" data-speed="190">5</h6>
                            <p class="m-0px font-w-600">Nombres de Demandes</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
