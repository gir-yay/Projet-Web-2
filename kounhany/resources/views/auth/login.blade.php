<!--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">-->
    <!-- font family --><!--
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,700&family=Nunito:ital,wght@0,400;0,500;0,600;1,300;1,600&display=swap"
        rel="stylesheet">
    <title>login</title>
</head>

<body>
    <div class="form login">
        <form action="{{ route('login') }}" method="POST">
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
        <p>Vous n'avez pas de compte ? <a href="{{ route('inscription') }}">S'inscrire</a></p>

    </div>
</body>

</html>
 -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
      <!--=============== REMIXICONS ===============-->
      <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    
    <!-- header start -->
    <header class="header">
         <nav class="nav container">
            <div class="nav__data">
               <a href="#" class="nav__logo">
               <i class="ri-open-arm-fill"></i> Koun Hany!
               </a>
               
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-line nav__burger"></i>
                  <i class="ri-close-line nav__close"></i>
               </div>
            </div>

            <!--=============== NAV MENU ===============-->
            <div class="nav__menu" id="nav-menu">
               <ul class="nav__list">
                  <li><a href="index.php" class="nav__link">Home</a></li>

                  <li><a href="#" class="nav__link">About Us</a></li>

                  <!--=============== DROPDOWN 1 ===============-->

                  <li class="dropdown__item">
                     <div class="nav__link">
                        Servicess <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                     </div>

                     <ul class="dropdown__menu">
                        <li>
                           <a href="#" class="dropdown__link">
                           <i class="ri-home-3-line"></i> Menage
                           </a>                          
                        </li>

                        <li>
                           <a href="#" class="dropdown__link">
                           <i class="ri-parent-line"></i> BabySiter
                           </a>
                        </li>

                        <li>
                           <a href="#" class="dropdown__link">
                           <i class="ri-restaurant-line"></i> Cuisine
                           </a>
                        </li>
                     </ul>
                  </li>

                  <li><a href="#" class="nav__link">Contact Us</a></li>
                  <li><a href="login.php" class="nav__link">Login</a></li>
               </ul>
            </div>
         </nav>
      </header>
    <!-- header end -->
<section class="side">
        <img src="images/login.png" alt="">
    </section>

    <section class="main">
        <div class="login-container">
            <p class="title">Login</p>
            <div class="separator"></div>
            <p class="welcome-message">Please, provide login credential to proceed and have access to all our services</p>

            <form class="login-form" action="{{ route('login') }}" method="POST">
            @csrf
                <div class="form-control">
                    <input type="email" placeholder="Email" name="email" id="email" value="{{ @old('email') }}">
                    <i class="fas fa-user"></i>
                    @error('email')
                    <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-control">
                    <input type="password" placeholder="Password" name="password_" id="mot_de_pass">
                    <i class="fas fa-lock"></i>
                    @error('password_')
                    <p class="error">{{ $message }}</p>
                   @enderror
                </div>

                <button class="submit">Login</button>
                <span>or <a href="{{ route('inscription') }}">Create account</a> </span>
            </form>
        </div>
    </section>
    <script  src="{{ asset('js/main.js') }}"> </script>
</body>
</html>