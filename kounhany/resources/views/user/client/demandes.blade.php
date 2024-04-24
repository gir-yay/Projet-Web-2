<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

<!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/client/swiper-bundle.min.css') }}">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
  <link rel="stylesheet" href="{{ asset('css/admin/ourclient.css') }}">
	<title>Dashboard client</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
    <i class="bx ri-open-arm-fill "></i>
			<span class="text">Koun Hany</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="{{ route('client.dashboard') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
			<a href="{{ route('client.profile') }}">
					<i class='bx bxs-cog' ></i>
					<span class="text">Mon Profile</span>
				</a>
			</li>
			<li class="active">
				<a href="{{ route('client.demande_client') }}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Mes demandes</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Mes commentaires</span>
				</a>
			</li>

		</ul>
		<ul class="side-menu">
			<li>
      <a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<form action="{{route("client.logout")}}" method="Post">
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
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Recherche...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
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
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>

             <section class="table__body">
                        <table>
                            <thead>
                                <tr>
                                    <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Email Expert <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Nom du service <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Date de debut <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Duree <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Total <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                                    <th> Action <span class="icon-arrow">&UpArrow;</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transformedDemandes as $demande)
                                    <tr>
                                        <td>{{ $demande['id']}}</td>
                                        <td>{{ $demande['email'] }}</td>
                                        <td>{{ $demande['service'] }}</td>
                                        <td>{{ $demande['date_debut'] }}</td>
                                        <td>{{ $demande['duree'] }}</td>
                                        <td>{{ $demande['total'] }}</td>
                                        <td>{{ $demande['etat'] }}</td>

                                        <td>
                                        <form action="" method="POST">
                                            @csrf
                                        <button type="submit" ></button>
                                        </form>
                                   
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </section>

		</main>
		<!-- MAIN -->
	



	<!-- CONTENT -->
	<script src="{{ asset('js/clientJS/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/clientJS/main.js') }}"></script>
	<script src="{{ asset('js/clientJS/script.js') }}"></script>
</body>
</html>
