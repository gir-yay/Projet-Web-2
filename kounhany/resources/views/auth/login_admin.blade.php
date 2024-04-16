<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,700&family=Nunito:ital,wght@0,400;0,500;0,600;1,300;1,600&display=swap"
        rel="stylesheet">
    <title>login</title>
</head>

<body>
    <div class="form login login_admin">
        <form action="{{ route('login_admin') }}" method="POST">
            @csrf
            <h1>Login</h1>
            <div class="input">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ @old('email') }}">
                @error('email')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <div class="input">
                <label for="mot_de_pass">Mot de passe</label>
                <input type="mot_de_pass" name="password_" id="mot_de_pass">
                @error('password_')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit">login</button>
        </form>

    </div>
</body>

</html>
