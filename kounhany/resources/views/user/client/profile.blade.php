<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Client Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <style>
    button {
    padding: 8px 16px;
    background-color: darkblue;
    color: white;
    border: 1px solid darkblue;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
    font-size: 14px;
    
    }

    button:hover {
    background-color: blue;
    color: white;
    }
    

    </style>

</head>

<body>
    <section class="section about-section gray-bg" id="about">
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
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <div class="about-text go-to">
                        <h3 class="dark-color">Profile</h3>
                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Nom</label>
                                    <p>{{ $user->nom }}</p>
                                </div>
                                <div class="media">
                                    <label>Prenom</label>
                                    <p>{{ $user->prenom }}</p>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <label>E-mail</label>
                                    <p>{{ $user->email }}</p>
                                </div>
                                <div class="media">
                                    <label>Phone</label>
                                    <p>{{ $user->phone }}</p>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    <form action="">
                        @csrf
                        <div class="button-container">
                        <button><a  style="color: aliceblue;" href="{{route("client.sdk_edit_client",$user)}}">Modifier</a></button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="about-avatar">
                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title alt>
                    </div>
                </div>
            </div>
            <div class="counter">
                <div class="row">
                    <div class="col-6 col-lg-4">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="500" data-speed="500">4.9</h6>
                            <p class="m-0px font-w-600">Rank</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="150" data-speed="150">5</h6>
                            <p class="m-0px font-w-600">Resrvation</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-4">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="850" data-speed="850">10</h6>
                            <p class="m-0px font-w-600">Commentaires</p>
                        </div>
                    </div>
                    <!--
<div class="col-6 col-lg-3">
<div class="count-data text-center">
<h6 class="count h2" data-to="190" data-speed="190">190</h6>
<p class="m-0px font-w-600">Telephonic Talk</p>
</div>
</div>
-->
                </div>
            </div>
        </div>
    </section>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
</body>

</html>
