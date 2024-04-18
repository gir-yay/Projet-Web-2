<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  <h1>Dashboard Admin</h1>
  <form action="{{route("admin.logout")}}" method="Post">
    @csrf
    <button>Logout</button>
  </form>
</body>
</html>
-->
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

	<title>Les Clients de KounHany</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
		<i class="bx ri-open-arm-fill "></i>
			<span class="text">KounHany</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="{{ route('admin.dashboard') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="{{ route('admin.ourclients') }}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Clients</span>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.ourexperts') }}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Partenaires</span>
				</a>
			</li>
			
			
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<form action="{{route("admin.logout")}}" method="Post">
                      @csrf
                     <button class="logout-btn">Logout</button>
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
				<img src="img/people.png">
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
							<a class="active" href="#">Our Client</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
            <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Customer's Orders</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <i class='bx bx-search' ></i>
            </div>
            
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Nom <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Prenom <span class="icon-arrow">&UpArrow;</span></th>
                        <th> email <span class="icon-arrow">&UpArrow;</span></th>
                        <th> adress <span class="icon-arrow">&UpArrow;</span></th>
                        <th> statut <span class="icon-arrow">&UpArrow;</span></th>
						<th> Action <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->nom }}</td>
            <td>{{ $client->prenom }}</td>
            <td>{{ $client->email }}</td>
            <td>{{ $client->adresse }}</td>
            <td>{{ $client->compte_status }}</td>
			<td>
    @if ($client->compte_status === 'active')
        <form action="{{ route('toggleStatus', $client->id) }}" method="POST">
            @csrf
            <button type="submit" class ="cancelled">Désactiver</button>
        </form>
    @else
        <form action="{{ route('toggleStatus', $client->id) }}" method="POST">
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