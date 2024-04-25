<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouveau Client</title>
</head>
<body>
    <h3>Bonjour {{ $name }}</h3>
    <p>Vous avez un nouveau client. Voici les détails du client :</p>
    <ul>
        <li><strong>Nom Complet :</strong> {{ $full_name }}</li>
        <li><strong>Téléphone :</strong> {{ $phone }}</li>
        <li><strong>Adresse :</strong> {{ $address }}</li>
    </ul>
</body>
</html>
