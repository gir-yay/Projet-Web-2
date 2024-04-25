<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up as expert</title>
    <style>
        body {
            background-color: beige;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        form {
            background-color: white;
            width: 400px;
            margin: 20px auto;
            padding: 40px;
            padding-top: 5px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            position: relative;

        }

        h2::after {
            content: "";
            display: block;
            width: 200px;
            height: 3px;
            background-color: maroon;
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"],
        input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 10px;
            background-color: maroon;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: 500;

        }

        input[type="submit"]:hover {
            background-color: beige;
            color: black
        }
    </style>
</head>

<body>

    <form action="{{ route('sdk_stock_expert') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h2>Créer un compte expert</h2>

        <label for="Nom">Nom</label>
        @error('nom')
            <span class="error-message" style="color: red; font-weight: bold; font-style: italic;">{{ $message }}
            </span>
        @enderror
        <input type="text" name="nom">

        <label for="prenom">Prenom</label>
        @error('prenom')
            <span class="error-message" style="color: red; font-weight: bold; font-style: italic;">{{ $message }}
            </span>
        @enderror
        <input type="text" name="prenom">

        <label for="email">Email</label>
        @error('email')
            <span class="error-message" style="color: red; font-weight: bold; font-style: italic;">{{ $message }}
            </span>
        @enderror
        <input type="email" name="email">

        <label for="password">Mot de passe</label>
        @error('password')
            <span class="error-message" style="color: red; font-weight: bold; font-style: italic;">{{ $message }}
            </span>
        @enderror
        <input type="password" name="password">

        <label for="metier">Métier</label>
        @error('metier')
            <span class="error-message" style="color: red; font-weight: bold; font-style: italic;">{{ $message }}
            </span>
        @enderror
        <input type="text" name="metier">

        <label for="bio">Bio</label>
        @error('bio')
            <span class="error-message" style="color: red; font-weight: bold; font-style: italic;">{{ $message }}
            </span>
        @enderror
        <input type="text" name="bio">

        <label for="photo">photo</label>
        @error('image')
            <span class="error-message" style="color: red; font-weight: bold; font-style: italic;">{{ $message }}
            </span>
        @enderror
        <input type="file" name="image">
        <input type="submit" value="S'inscrire">
    </form>
</body>

</html>
