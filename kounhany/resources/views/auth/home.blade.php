<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>KounHany</title>
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
                    <li><a href="#" class="nav__link">Home</a></li>

                    <li><a href="#about" class="nav__link">About Us</a></li>

                    <!--=============== DROPDOWN 1 ===============-->

                    <li class="dropdown__item">
                        <div class="nav__link">
                            Servicess <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                        </div>

                     <ul class="dropdown__menu">
                        <li>
                        <a href="{{ route('client.services') }}" class="dropdown__link">
                            <i class="ri-home-3-line"></i> Ménage
                        </a>                        
                        </li>

                       
                     </ul>
                  </li>

                    <li><a href="#contact" class="nav__link">Contact Us</a></li>
                    <li><a href="{{ route('login') }}" class="nav__link">Login</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- header end -->
    <!-- home start -->
    <section class="home" id="home">
        <div class="content">
            <h3>We believe we can always help you!</h3>
        </div>
    </section>
    <!-- home end -->


    <!-- services start -->
    <section class="services" id="service">
        <div class="services">
            <div class="card__container">
                <article class="card__article">
                    <h1>Ménage</h1>
                    <img src="images/babysitter.png" alt="image" class="card__img">

                    <div class="card__data">
                        <span class="card__description"> </span>
                        <h2 class="card__title">Garde d'enfants experte et rassurante</h2>
                        <a href="{{ route('login') }}" class="card__button">Demander</a>
                    </div>
                </article>

                <article class="card__article">
                    <h1>BabySitter</h1>
                    <img src="images/menage.png" alt="image" class="card__img">

                    <div class="card__data" id="babysitter">
                        <span class="card__description"></span>
                        <h2 class="card__title">Profitez d'un intérieur étincelant sans effort</h2>
                        <a href="{{ route('login') }}" class="card__button">Demander</a>
                    </div>
                </article>

                <article class="card__article">
                    <h1>Cuisine</h1>
                    <img src="images/cuisine.png" alt="image" class="card__img">

                    <div class="card__data">
                        <span class="card__description"></span>
                        <h2 class="card__title">Repas faits maison selon vos goûts</h2>
                        <a href="{{ route('login') }}" class="card__button">Demander</a>
                    </div>
                </article>
            </div>
        </div>

    </section>
    <!-- services end -->
    <!-- About start-->
    <section class="about" id="about">
        <div class="section-item-container">
            <img src="images/aboutbg.png" class="section-bg" alt="">
            <div class="section-info">
                <h1 class="title"> Kon <span>Hany</span> !</h1>
                <p class="info">
                    Notre application vise à simplifier votre vie en vous proposant des services domestiques
                    personnalisés.
                    Que ce soit pour le ménage, la cuisine ou la garde d'enfants,
                    KounHany nous sommes là pour répondre à vos besoins. Avec notre réseau de professionnels qualifiés,
                    vous pouvez compter sur nous pour vous offrir un service fiable et pratique, directement chez vous
                </p>
            </div>
        </div>
    </section>
    <!-- About  end -->
    <!-- image collage start -->
    <section class="image-mid-section">
        <div class="image-collage">
            <div class="image-collection">
                <img src="images/collage1.png"class="collage-img" alt="">
                <img src="images/collage2.png"class="collage-img" alt="">
                <img src="images/collage3.png"class="collage-img" alt="">

            </div>

        </div>

    </section>
    <!-- image collage  end -->


    <!-- ontact us  start -->



    <footer id="contact">
        <div class="main-content">
            <div class="left box">
                <h2>About us</h2>
                <div class="content">
                    <p>Chez KounHany nous rendons les tâches domestiques <br>faciles. <br> <br>
                        Notre application met en relation les clients <br> <br>
                        avec des experts en ménage, cuisine et garde d'enfants.</p>
                    <div class="social">
                        <a href="https://facebook.com/coding.np"><span class="fab fa-facebook-f"></span></a>
                        <a href="#"><span class="fab fa-twitter"></span></a>
                        <a href="https://instagram.com/coding.np"><span class="fab fa-instagram"></span></a>
                        <a href="https://youtube.com/c/codingnepal"><span class="fab fa-youtube"></span></a>
                    </div>
                </div>
            </div>
            <div class="center box">
                <h2>Address</h2>
                <div class="content">
                    <div class="place">
                        <span class="fas fa-map-marker-alt"></span>
                        <span class="text">Hay Salam, Rabat</span>
                    </div>
                    <div class="phone">
                        <span class="fas fa-phone-alt"></span>
                        <span class="text">+212-765432100</span>
                    </div>
                    <div class="email">
                        <span class="fas fa-envelope"></span>
                        <span class="text">kounHany@gmail.ma</span>
                    </div>
                </div>
            </div>
            <div class="right box">
                <h2>Contact us</h2>
                <div class="content">
                    <form action="{{ route('contact') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="email">
                            <div class="text">Email *</div>
                            <input type="email" name="email" required>
                        </div>
                        <div class="msg">
                            <div class="text">Message *</div>
                            <textarea rows="2" name="message" cols="25" required style="resize:none"></textarea>
                        </div>
                        <div class="btn">
                            <button type="submit" class="btn-contact">envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bottom">
            <center>
                <span class="credit">Koun <a href="#">Hany!</a> | </span>
                <span class="far fa-copyright"></span><span> 2024 Tous droits réservés.</span>
            </center>
        </div>
    </footer>

    <!-- Contact us  end-->



    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
