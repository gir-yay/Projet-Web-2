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
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/settings.css') }}">



    <title>Parametres</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">

            <i class="bx ri-open-arm-fill "></i>
            <span class="text">KounHany !</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.ourclients') }}">

                    <i class='bx bxs-group'></i>
                    <span class="text">Clients</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.ourexperts') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Partenaires</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.ourservices') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Services</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.settings.index') }}">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Paramètres</span>
                </a>
            </li>


            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <form action="{{ route('admin.logout') }}" method="Post">
                        @csrf
                        <button class="logout-btn">Se Déconnecter</button>
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
            <a href="#" class="nav-link"></a>
            <form action="#">
                <div class="form-input">


                </div>
            </form>

            <a href="#" class="notification">
                <i></i>

            </a>
            <a href="#" class="profile">
                <img src="../images/iconadmin.png">
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
                            <a class="active" href="#">Paramètres</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="box-info">

                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action {{ !session()->has('setting') || session('setting') == 'email-settings' ? 'active' : '' }}"
                                        data-bs-toggle="tab" href="#email-setting" role="tab">Email Settings</a>
                                    <a class="list-group-item list-group-item-action {{ session()->has('setting') && session('setting') == 'paypal-settings' ? 'active' : '' }}"
                                        data-bs-toggle="tab" href="#paypal-setting" role="tab">PayPal Settings</a>
                                    <a class="list-group-item list-group-item-action  {{ session()->has('setting') && session('setting') == 'general-settings' ? 'active' : '' }}"
                                        data-bs-toggle="tab" href="#general-setting" role="tab">General Settings</a>

                                </div>
                            </div>
                            <div class="col-12 col-sm-8 mt-3 mt-sm-0">

                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade {{ !session()->has('setting') || (session()->has('setting') && session('setting') == 'email-settings') ? 'active show' : '' }}"
                                        id="email-setting" role="tabpanel">
                                        @include('admin.settings.email_settings')
                                    </div>
                                    <div class="tab-pane fade {{ session()->has('setting') && session('setting') == 'paypal-settings' ? 'show active' : '' }}"
                                        id="paypal-setting" role="tabpanel">
                                        @include('admin.settings.paypal_settings')
                                    </div>
                                    <div class="tab-pane fade {{ session()->has('setting') && session('setting') == 'general-settings' ? 'show active' : '' }}"
                                        id="general-setting" role="tabpanel">
                                        @include('admin.settings.general_settings')
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->


    <script src="{{ asset('js/adminJS/script.js') }}"></script>

    <script src="{{ asset('js/adminJS/table.js') }}"></script>
</body>

</html>
