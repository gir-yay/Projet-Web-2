<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <title>Email</title>
</head>
<body style='font-family: "Nunito Sans", sans-serif; padding:10px 5px 30px 5px; background:#EFEEEC'>
    <div style=" font-size: 30px;
    text-align: center;
    color: #99582a;
    margin-bottom: 20px;
    margin: 10px 0">KounHany!</div>

    <div style="font-family: Arial, sans-serif; max-width: 550px; padding:10px 20px 20px 20px;background: #F6F8FC;
    box-shadow: 0 0 1px #ddd;

    border-radius: 5px;margin:auto">
        <h2>Bonjour, {{ $name }} !</h2>
        <p>Vous avez un nouveau client. Voici les détails du client :</p>
        <ul>
            <li style="margin-bottom:5px"><strong>Nom Complet :</strong> {{ $full_name }}</li>
            <li style="margin-bottom:5px"><strong>Téléphone :</strong> {{ $phone }}</li>
            <li><strong>Adresse :</strong> {{ $address }}</li>
        </ul>
    </div>
</body>
</html>
