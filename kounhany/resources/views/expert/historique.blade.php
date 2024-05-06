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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- bootstrap for popup-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/expert/dashexpert.css') }}">
    <link rel="stylesheet" href="{{ asset('css/star.css') }}">

    <title>Historique des demandes</title>
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
                <a href="{{ route('expert.dashboard') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('expert.profile') }}">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Mon Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('expert.demandes.index') }}">
                    <i class='bx bxs-group'></i>
                    <span class="text">Mes demandes</span>
                </a>
            </li>
            <li  class="active">
                <a href="{{ route('expert.historique.index') }}">
                    <i class="bx bxs-group"></i>
                    <span class="text">Historique</span>
                </a>
            </li>
            <li>
                <a href="{{ route('expert.domaines.index') }}" class="domaines">
                    <i class="fa-brands fa-servicestack"></i>
                    <span class="text">Mes domaines</span>
                </a>
            </li>
            <li>
                <a href="{{ route('expert.avis.index') }}">
                    <i class='bx bxs-message-dots'></i>
                    <span class="text">Avis</span>
                </a>
            </li>
            <li>
                <a href="{{ route('expert.payment.index') }}">
                    <i class='bx bxs-wallet'></i>
                    <span class="text">Paiement</span>
                </a>
            </li>




            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <form action="{{ route('expert.logout') }}" method="Post">
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
                <img src="{{ asset(auth('expert')->user()->photo) }}">
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
                            <a class="active" href="#">Historique des demandes</a>
                        </li>
                    </ul>
                </div>
            </div>


            <a href="{{route('expert.historique.treated')}} "class="text-warning">Historique</a>
            <div class="box-info">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hovered">
                        <thead>
                            <tr>
                                <th>Service</th>
                                <th>Date de début</th>
                                <th>Durée</th>
                                <th>Description</th>
                                <th>Total</th>
                                <th>Commentaires</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($demandes as $demande)
                                <tr>
                                    <td>{{ $demande->service->nom }}</td>
                                    <td>{{ $demande->date_debut }}</td>
                                    <td>{{ $demande->duree }} jours</td>
                                    <td>{{ $demande->description }}</td>
                                    <td><span class="fw-bold">${{ $demande->total }}</span></td>
                                    <td>
                                    @php
                                    $start = \Carbon\Carbon::parse($demande->date_debut);
                                    $start = $start->copy()->addDays($demande->duree);
                                    $end = $start->copy()->addDays(7);
                                    $today = \Carbon\Carbon::today();
                                    @endphp
                                    @if($demande->etat == 'accepte')
                                    @if($today->greaterThanOrEqualTo($start) && $today->lessThan($end)) 
                                   
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Commenter</button>
                                     <!-- Modal -->
                                        <div class="modal fade" id="myModal" role="dialog" >
   
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="height: 600px; margin-top: 30%">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ajouter un commentaire</h4>
        </div>
        <form action="{{Route('expert.commentaires-sur-client.store')}}" method="POST">
            @csrf
        <input type="hidden" name="demande_id" value="{{ $demande->id }}">
        <input type="hidden" name="expert_id" value="{{ $demande->expert_id }}">
        <input type="hidden" name="client_id" value="{{ $demande->client_id }}">
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
            
          <button type="submit" class="btn btn-danger">Commenter</button>
          
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
                </div>
            </div>




        </main>
        <!-- MAIN -->
    </section>


    <script src="{{ asset('js/expertJS/script.js') }}"></script>
</body>

</html>
