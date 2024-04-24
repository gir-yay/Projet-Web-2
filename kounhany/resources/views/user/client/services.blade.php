<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nos services </title>
    <link rel="icon" href="https://img.icons8.com/ios-filled/100/000000/nike.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/services/product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/services/stellarnav.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>

<header class="head1">
            <div class="container">
                <ul class="plus">
                    <li>Koun Hany</li>
                    <!-- add logo -->
                    <li><img src="" alt=""></li>
                </ul>
                <ul class="account">
                    <li>Home</li>
                    <li>
				<a href="#" class="logout">
					<form action="{{route("client.logout")}}" method="Post">
                      @csrf
                     <button class="logout-btn">Se déconnecter</button>
                    </form>
				</a>
			</li>
                </ul>
            </div>
        </header>
       

        <section class="offers">
            <div class="container">
                <h4>Nos services </h4>
            </div>
        </section>

        <section class="mt-3">
            <div class="container filter">
                <div class="cap">
                    <h4>FILTER</h4>
                </div>
            </div>
        </section>

        <section class="mt-3">
            <div class="container product-selection">
                <div class="select">
                  <button class="accordion font-weight-bold mb-3"></button>
                  <div class="panel">
                    <button class="accordion font-weight-bold mb-3">CATAGORIES</button>
                    <div class="panel">
                      <p><<a href="#">Babysitting</a></p>
                      <p><a href="#">Cuisine</a></p>
                      <p><a href="#">Menage</a></p>
                    </div>
                    


                    
                    <button class="accordion font-weight-bold mb-3">Prix</button>
                    <input type="range" class="custom-range p-4" id="customRange" name="points1">


                    <button class="accordion font-weight-bold mb-3">Ville</button>
                    <div class="panel">
                      <input type="text" name="ville" id="ville">
                    </div>

                    <button class="accordion font-weight-bold mb-3">Note </button>
                    <div class="panel">
                      <p><a href="#">1</a></p>
                      <p><a href="#">2</a></p>
                      <p><a href="#">3</a></p>
                      <p><a href="#">4</a></p>
                      <p><a href="#">5</a></p>
                    </div>

                    <button class="accordion font-weight-bold mb-3"></button>
                    <div class="panel">
                    </div>

                    <div class="panel size"></div></div>
                </div>

                <div class="product-view">
    @foreach($experts as $expert)
        @if(isset($expert->expert) && $expert->expert !== null)
            <div class="">
                <img src="{{ $expert->expert->photo }}" alt="Expert Photo">
                <div class="card-body">
                    <h6 class="mt-2">{{ $expert->expert->nom }} {{ $expert->expert->prenom }}</h6>
                    <small>{{ $expert->prix_par_duree }}</small>
                    <h6>{{ $expert->ville }}</h6>
                </div>
            </div>
        @endif
    @endforeach
</div>
           
                 
        </section>

        <footer class="page-footer font-small indigo mt-5">

            <div class="footer-copyright text-center py-3">© KOUN HANY Copyright:
             
            </div>
        
          
        </footer>
    
    



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script  src="{{ asset('js/servicesJS/stellarnav.js') }}"> </script>
    <script src="{{ asset('js/servicesJS/product.js') }}"></script>
    
</body>
</html>


