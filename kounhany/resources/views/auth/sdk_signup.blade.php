<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Sign up</title>
<style>
body {
background-color: beige;
margin: 0;
padding: 0;
font-family: Arial, sans-serif;
display: flex; /* Utilisation de flexbox pour centrer le contenu */
justify-content: center; /* Centrage horizontal */
height: 100vh; /* Utilisation de la hauteur de la fenêtre pour centrer verticalement */
}

.container {
text-align: center; /* Centrage du contenu à l'intérieur du conteneur */
margin-top: 100px;
}

h2 {
margin-top: 50px;
position: relative;

}

h2::after {
content: "";
display: block;
width: 50px;
height: 3px;
background-color: maroon;
position: absolute;
bottom: -10px;
left: 50%;
transform: translateX(-50%);
}

h4 {
margin-top: 50px;
margin-bottom: 20px;
}

button {
position: relative; /* Make the button a positioned element */
padding: 10px 20px;
background-color: burlywood;
color: bisque;
border: none;
border-radius: 5px;
cursor: pointer;
transition: background-color 0.3s;
width: 200px;
overflow: hidden; /* Add overflow property */
}

button:hover {
background-color: whitesmoke;
color: black;
}

button a {
display: block;
width: 100%;
height: 100%;
text-decoration: none;
color: black;
position: absolute;
top: 0;
left: 0;
padding-top: 2px;
}
</style>
</head>
<body>
    <div class="container">
        <h2>SIGN UP</h2>
        <h4>You are :</h4>
        <button><a href="{{route('sdk_client')}}">CLIENT</a></button>
        <button><a href="{{route('sdk_expert')}}">PARTENAIRE</a></button>
    </div>
</body>
</html>