<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

    <!-- bootstrap for popup-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/client/swiper-bundle.min.css') }}">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/ourclient.css') }}">
    <link rel="stylesheet" href="{{ asset('css/star.css') }}">
    <title>Dashboard client</title>
    <style>
    a:link,
a:visited {
    text-decoration: none;
}
a:hover,
a:active {
    text-decoration: none;
}


    </style>
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
                <a href="{{ route('client.dashboard') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('client.profile') }}">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Mon Profile</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('client.demande_client') }}">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Mes demandes</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Mes commentaires</span>
                </a>
            </li>


            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <form action="{{ route('client.logout') }}" method="Post">
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
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="">
                <!--img src="img/people.png"-->
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title" >
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb" style="background-color: #eee;">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        
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
                                <td>{{ $demande['demande_id'] }}</td>
                                <td>{{ $demande['email'] }}</td>
                                <td>{{ $demande['service'] }}</td>
                                <td>{{ $demande['date_debut'] }}</td>
                                <td>{{ $demande['duree'] }}</td>
                                <td>{{ $demande['total'] }}</td>
                                <td>{{ $demande['etat'] }}</td>

                                <td>
                                    @php
                                    $start = \Carbon\Carbon::parse($demande['date_debut']);
                                    $start = $start->copy()->addDays($demande['duree']);
                                    $end = $start->copy()->addDays(7);
                                    $today = \Carbon\Carbon::today();
                                    @endphp
                                    @if($demande['etat'] == 'accepte')
                                    @if($today->greaterThanOrEqualTo($start) && $today->lessThan($end))
                                   
                                        <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#myModal">Commenter</button>

                                         <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="height: 600px; margin-top: 30%">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter un commentaire</h4>
        </div>
        <form action="{{Route('client.commentaires-sur-expert.store')}}" method="POST">
            @csrf
        <input type="hidden" name="demande_id" value="{{ $demande['demande_id'] }}">
        <input type="hidden" name="expert_id" value="{{ $demande['expert_id'] }}">
        <input type="hidden" name="client_id" value="{{ $demande['client_id'] }}">
        <div class="modal-body">
             <span>Notez le service: </span><br>
          <div class="stars">
  <input type="radio" id="star1" name="note" value="1" />
  <input type="radio" id="star2" name="note" value="2" />
  <input type="radio" id="star3" name="note" value="3" />
  <input type="radio" id="star4" name="note" value="4" />
  <input type="radio" id="star5" name="note" value="5" />
  
  <label for="star1" aria-label="Banana">1 star</label><label for="star2">2 stars</label><label for="star3">3 stars</label><label for="star4">4 stars</label><label for="star5">5 stars</label>
</div>
<br><br>
          <textarea name="commentaire" id="comment" cols="60" rows="15" placeholder="Ajouter un commentaire"></textarea>
        </div>
        <div class="modal-footer">
            
          <button type="submit" class="btn btn-default" >Commenter</button>
          
        </div>
        </form>
      </div>
      
    </div>
  </div>
                                    
                                    @endif
                                    @endif

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
