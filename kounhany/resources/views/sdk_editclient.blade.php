<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Modifier profile </title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css" crossorigin="">

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="{{ asset('css/client/swiper-bundle.min.css') }}">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin/ourclient.css') }}">



<style>

body {
background-color:#eee ;
margin: 0;
padding: 0;
}


#form {
background-color: white;
width: 600px;
margin: 20px auto;
padding: 40px;
padding-top: 5px;
border-radius: 10px;
box-shadow: 0px 0px 5px 0px darkblue;

}

#h2 {
text-align: center;
margin-bottom: 30px;
position: relative;
}

#h2::after {
content: ""; 
display: block;
width: 200px;
height: 3px; 
background-color: darkblue; 
position: absolute; 
bottom: -10px; 
left: 50%; 
transform: translateX(-50%); 
}

.label_form {
display: block;
margin-bottom: 10px; 
font-weight: 500;
}

.text_input{
width: calc(100% - 20px); 
padding: 10px;
margin-bottom: 20px;
border: 1px solid #ccc;
border-radius: 5px;
box-sizing: border-box;
}

#submit{
width: calc(100% - 300px); 
padding: 10px;
background-color: darkblue; 
color: white;
border: none;
border-radius: 5px;
cursor: pointer;
transition: background-color 0.3s;
font-weight: 500;
margin-left: 30%;
margin-top: 10%;

}

#submit:hover {
background-color: beige; 
color: black
}
</style>
</head>
<body>
    
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
            <li class="active">
                <a href="{{ route('client.profile') }}">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Mon Profile</span>
                </a>
            </li>
            <li >
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
    <section id="content" >
        <!-- NAVBAR -->
        <nav >
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
        <main style="background-color:#eee">
            <div class="head-title">
                <div class="left">
                    <h1>Dashboard</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Dashboard</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
    <form id="form" action="{{ route('client.sdk_stockupdatec',$client) }}" method="POST">
        @method('PUT')
        @csrf
        <h2 id="h2">Modifier votre profile</h2>
        <label for="Nom" class="label_form">Nom</label>
        @error('nom')
        <span class="error-message" style="color: red; font-weight: bold; font-style: italic;">{{ $message }} </span>
        @enderror
        <input class="text_input"  type="text" name="nom" value="{{old("nom",$client->nom)}}" >
        <label for="prenom" class="label_form">Prenom</label>
        @error('prenom')
        <span class="error-message" style="color: red; font-weight: bold;font-style: italic; ">{{ $message }} </span>
        @enderror
        <input type="text" class="text_input"  name="prenom" value="{{old("prenom",$client->prenom)}}">
        <label for="email" class="label_form">Email</label>
        @error('email')
        <span class="error-message" style="color: red; font-weight: bold;font-style: italic; ">{{ $message }} </span>
        @enderror
        <input class="text_input"  type="email" name="email" value="{{old("email",$client->email)}}">
        <label for="tel" class="label_form">Téléphone</label>
        @error('tel')
        <span class="error-message" style="color: red; font-weight: bold;font-style: italic; ">{{ $message }} </span>
        @enderror
        <input class="text_input"  type="text" name="tel" value="{{old("tel",$client->phone)}}">
        <label for="adresse" class="label_form">Adresse</label>
        @error('adresse')
        <span class="error-message" style="color: red; font-weight: bold; font-style: italic;">{{ $message }} </span>
        @enderror
        <input class="text_input"  type="text" name="adresse" value="{{old("adresse",$client->adresse)}}">
        <label for="mdp" class="label_form">Mot de passe</label>
        @error('password')
        <span class="error-message" style="color: red; font-weight: bold;font-style: italic; ">{{ $message }} </span>
        @enderror
        <input class="text_input"  type="password" name="password" >
        <input type="submit" value="Modifier" id="submit">
        
    </form>

         </section>

        </main>
</body>
</html>

