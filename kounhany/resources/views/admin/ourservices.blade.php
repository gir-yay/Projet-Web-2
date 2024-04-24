<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/ourclient.css') }}">

    <title>Les Services de KounHany</title>
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
            <li >
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
             <li class="active">
                <a href="{{ route('admin.ourservices') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Services</span>
                </a>
            </li>
            <li  class="">
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
                            <a class="active" href="#">Services</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <main class="table" id="customers_table">
                    <section class="table__header">
                        <h1></h1>
                        @if ($errors->any())
                            <ul>
                         @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                         @endforeach
                         </ul>
                            @endif
                        <form method="post" action="{{route('admin.ourservices.store')}}">
                        @csrf
                        <input type="text" name="nom" placeholder="nom du service">
                        <button type="submit">Ajouter un service</button>
                        </form>
                        <div class="input-group">
                            <input type="search" placeholder="Search Data...">
                            <i class='bx bx-search'></i>
                        </div>

                    </section>
                    <section class="table__body">
                        <table>
                            <thead>
                                <tr>
                                    <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> nom <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Date de creation <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Date de modification <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> status <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Action <span class="icon-arrow">&UpArrow;</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>{{ $service->nom }}</td>
                                        <td>{{ $service->created_at }}</td>
                                        <td>{{ $service->updated_at }}</td>
                                        <td><span
                                                class="{{ $service->service_status == 'active' ? 'active' : 'non-active' }} status-compte">{{ $service->service_status }}</span>
                                        </td>
                                        <td>
                                            @if ($service->service_status === 'active')
                                                <form action="{{ route('admin.toggleStatus', $service->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class ="cancelled">Désactiver</button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.toggleStatus', $service->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="delivered">Activer</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </section>
                </main>

            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="{{ asset('js/adminJS/script.js') }}"></script>
    <script src="{{ asset('js/adminJS/table.js') }}"></script>
</body>

</html>
