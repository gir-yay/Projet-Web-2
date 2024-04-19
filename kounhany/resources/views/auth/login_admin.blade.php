
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href=" {{ asset('css/admin/adminlogin.css') }}" />
    <title>Espace Admin</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form  action="{{ route('login_admin') }}" method="POST" class="sign-in-form">
          @csrf
            <h2 class="title">Login</h2>
            @error('email')
                    <p class="error">{{ $message }}</p>
              @enderror
              @error('password_')
                    <p class="error">{{ $message }}</p>
              @enderror
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="Email" name="email" id="email" value="{{ @old('email') }}" />
              
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Mot de passe" name="password_" id="mot_de_pass"/>
             
            </div>
            <input type="submit" value="Login" class="btn solid" />
          </form>
          
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Bienvenue !</h3>
            <p>
            Accédez à votre espace réservé pour gérer en toute simplicité votre plateforme KounHany.
            </p>
          </div>
          <img src="images/adminlogin.png" class="image" alt="" />
        </div>
        
      </div>
    </div>
  </body>
</html>