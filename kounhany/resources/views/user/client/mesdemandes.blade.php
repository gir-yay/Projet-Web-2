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
    
    <link rel="stylesheet" href="{{ asset('css/star.css') }}">

    <title>Les Clients de KounHany</title>
</head>

<body>

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
             <li>
                <a href="{{ route('services') }}">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Services</span>
                </a>
            </li>
            <li class="active">
                <a href="{{ route('client.demande_client') }}">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Mes demandes</span>
                </a>
            </li>
            <li>
                <a href="{{route('client.avis.index')}}">
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
                    <h1>Mes Demandes</h1>
                    <ul class="breadcrumb">
                        <li>
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Mes Demandes</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="table-data">
                <main class="table" id="customers_table">
                    <section class="table__header">
                        <h1></h1>
                        <div class="input-group">
                            <input type="search" placeholder="Rechercher...">
                            <i class='bx bx-search'></i>
                        </div>

                    </section>
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
                                <td>{{ $demande['duree'] }} jours</td>
                                <td>{{ $demande['total'] }} MAD</td>
                                <td class="<?php echo $demande['etat'] === 'accepte' ? 'delivered' : ($demande['etat'] === 'en attente' ? 'shipped' : 'cancelled'); ?>"><?php echo $demande['etat']; ?></td>
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

            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="{{ asset('js/adminJS/script.js') }}"></script>
    <script src="{{ asset('js/adminJS/table.js') }}"></script>
    <script src="{{ asset('js/clientJS/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('js/clientJS/main.js') }}"></script>
        <script src="{{ asset('js/clientJS/script.js') }}"></script>
        
</body>

</html>
