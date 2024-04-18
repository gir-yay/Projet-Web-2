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
	<link rel="stylesheet" href="{{ asset('css/admin/dashadmin.css') }}">

	<title>Admin KounHany</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			
			<i class="bx ri-open-arm-fill "></i>
			<span class="text">KounHany</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="{{ route('admin.dashboard') }}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li >
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
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
			</div>
			

			<ul class="box-info">
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>{{ $totalClients}}</h3>
						<p>Clients</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>{{ $totalExperts }}</h3>
						<p>Partenaires</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3>{{$totalServices}}</h3>
						<p>Services</p>
					</span>
				</li>
			</ul>


			<div class="table-data">
				<div class="order">
					<table>
					</table>
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