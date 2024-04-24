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
  <link rel="stylesheet" href="{{ asset('css/client/dashclient.css') }}">
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
			<li class="active">
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
			<li>
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

			<section class="container">
         <div class="card__container swiper">
            <div class="card__content">
               <div class="swiper-wrapper">
                  <article class="card__article swiper-slide">
                     <div class="card__image">
                        <img src="/images/avatar-1.png" alt="image" class="card__img">
                        <div class="card__shadow"></div>
                     </div>
      
                     <div class="card__data">
                        <h3 class="card__name">Kell Dawx</h3>
                        <p class="card__description">
                           Passionate about development and design, 
                           I carry out projects at the request of users.
                        </p>
      
                        <a href="#" class="card__button">View More</a>
                     </div>
                  </article>
      
                  <article class="card__article swiper-slide">
                     <div class="card__image">
                        <img src="/images/avatar-2.png" alt="image" class="card__img">
                        <div class="card__shadow"></div>
                     </div>
      
                     <div class="card__data">
                        <h3 class="card__name">Lotw Fox</h3>
                        <p class="card__description">
                           Passionate about development and design, 
                           I carry out projects at the request of users.
                        </p>
      
                        <a href="#" class="card__button">View More</a>
                     </div>
                  </article>
      
                  <article class="card__article swiper-slide">
                     <div class="card__image">
                        <img src="/images/avatar-3.png" alt="image" class="card__img">
                        <div class="card__shadow"></div>
                     </div>
      
                     <div class="card__data">
                        <h3 class="card__name">Sara Mit</h3>
                        <p class="card__description">
                           Passionate about development and design, 
                           I carry out projects at the request of users.
                        </p>
      
                        <a href="#" class="card__button">View More</a>
                     </div>
                  </article>
      
                  <article class="card__article swiper-slide">
                     <div class="card__image">
                        <img src="/images/avatar-4.png" alt="image" class="card__img">
                        <div class="card__shadow"></div>
                     </div>
      
                     <div class="card__data">
                        <h3 class="card__name">Jenny Wert</h3>
                        <p class="card__description">
                           Passionate about development and design, 
                           I carry out projects at the request of users.
                        </p>
      
                        <a href="#" class="card__button">View More</a>
                     </div>
                  </article>

                  <article class="card__article swiper-slide">
                     <div class="card__image">
                        <img src="/images/avatar-5.png" alt="image" class="card__img">
                        <div class="card__shadow"></div>
                     </div>
      
                     <div class="card__data">
                        <h3 class="card__name">Lexa Kin</h3>
                        <p class="card__description">
                           Passionate about development and design, 
                           I carry out projects at the request of users.
                        </p>
      
                        <a href="#" class="card__button">View More</a>
                     </div>
                  </article>
               </div>
            </div>

            <!-- Navigation buttons -->
            <div class="swiper-button-next">
               <i class="ri-arrow-right-s-line"></i>
            </div>
            
            <div class="swiper-button-prev">
               <i class="ri-arrow-left-s-line"></i>
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination"></div>
         </div>
      </section>
		</main>
		<!-- MAIN -->
	</section>



	<!-- CONTENT -->
	<script src="{{ asset('js/clientJS/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/clientJS/main.js') }}"></script>
	<script src="{{ asset('js/clientJS/script.js') }}"></script>
</body>
</html>
