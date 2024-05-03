<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{ asset('css/admin/ourclient.css') }}">

	<title>Les Prtenaires de KounHany</title>
    <style>
    .comment-card {
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
    padding: 10px;
    background-color: #f9f9f9;
    }
     
    .expert-info {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .comment-content {
        margin-left: 20px;
    }
    .comment-card button {
    background-color: #ff3333; /* Rouge */
    color: #fff; /* Texte blanc */
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    }

    .comment-card button:hover {
        background-color: #cc0000; /* Rouge plus foncé au survol */
    }
    </style>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
		<i class="bx ri-open-arm-fill "></i>
			<span class="text">KounHany !</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="{{ route('admin.dashboard') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
				<a href="{{ route('admin.ourclients') }}">
				<i class='bx bxs-group' ></i>
					<span class="text">Clients</span>
				</a>
			</li>
			<li class="active">
				<a href="{{ route('admin.ourexperts') }}">
				<i class='bx bxs-group' ></i>
					<span class="text">Partenaires</span>
				</a>
			</li>
            <li>
                <a href="{{ route('admin.ourservices') }}">
                    <i class='bx bxs-home'></i>
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
					<i class='bx bxs-log-out-circle' ></i>
					<form action="{{route("admin.logout")}}" method="Post">
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
			<i class='bx bx-menu' ></i>
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
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Partenaires</a>
						</li>
					</ul>
				</div>
			</div>
            <h2>{{$expert->nom}}</h2>
            <br>
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
            <br>
            @if(count($commentaires) == 0)
            <p style="text-align: center">Aucun commentaires pour l'instant !</p>
            @else
            @foreach ($commentaires as $commentaire)
            <div class="comment-card">
                <div class="comment-content">
                    <p>Commentaire  : {{ $commentaire->commentaire }}</p>
                    <p>Demande : {{ $commentaire->demande->demande_id }}</p>
                    <p>sur le client : {{ $commentaire->demande->client->nom }}</p>

                    <form action="{{route('admin.sdk_delete',$commentaire->id)}}"  method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </div>
            </div>
            @endforeach
            @endif
    <script src="{{ asset('js/adminJS/script.js') }}"></script>
	<script src="{{ asset('js/adminJS/table.js') }}"></script>
</body>
</html>
