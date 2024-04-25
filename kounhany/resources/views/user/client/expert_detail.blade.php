<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <script src="https://kit.fontawesome.com/8b4b4337c0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('css/client/expert_detail.css') }}">
</head>
<body>
  <!-- Affichage des détails de l'expert -->
<div class="container">
        <div class="title">EXPERTT DETAIL</div>
         <!-- Toastr message -->
    
        <div class="detail">
            <div class="image">
                <img src="{{ asset($expert->photo) }}">
            </div>
            <div class="content">
                <h1 class="name"> {{ $expert->nom }}  {{ $expert->prenom }} <div class="price ville">{{ $serviceExpert->nbr_annee_d_exp }} d'expérience</div></h1>
                <div class="price"><i class="fa-solid fa-sack-dollar"></i>{{ $serviceExpert->prix_par_duree }} MAD / jour</div>
                <div class="price ville" style="font-size=200;"> <i class="fa fa-map-marker-alt"></i> {{ $serviceExpert->ville }}</div>
                <div class="ville"><i class="fa-solid fa-calendar-days"></i> {{ $serviceExpert->disponibilite}}</div>
                <br> <br>

                <div class="description"><i class="fa-solid fa-address-book"></i> Biographie : {{ $expert->bio }}</div>
                <br>
                <div class="buttons">
                   <form >
                    <button type="submit" id="open">Demander</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="title">Commentaires</div>
        <div class="listProduct"></div>
    </div>


    <section id="testimonial_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testmonial_slider_area text-center owl-carousel">
                    @foreach($comments as $comment)
<div class="box-area">
    <div class="img-area">
        <img src="{{ asset('images/user.png') }}" alt="">
    </div>
    <h5>{{$comment->client->prenom . " " . $comment->client->nom}}</h5>
    <p class="content">
        {{ $comment->commentaire }}
    </p>
    <div class="rating">
    @for($i = 1; $i <= 5; $i++)
        @if($i <= $comment->note)
            <i class="fa fa-star" style="color: #583A28;"></i> <!--  les étoiles remplies -->
        @else
            <i class="fa fa-star"></i> <!-- Étoile vide -->
        @endif
    @endfor
</div>
</div>
@endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


<!-- forum -->


<div class="modall-containerr show" id="modall-containerr">
        <div class="modall">
             <span id="close">X</span>
             <div class="modall-inner">
               <div class = "card-containe">
                 <div class = "card-img"> <!-- image here --></div>
                <div class ="card-content">
                    <h3>Demande de service</h3>
                    <form  action="{{ route('demandes-client.store')}}" method="POST">
                    @csrf
                        <div class = "form-row">
                            <input type = "date" id="date_debut" name="date_debut">
                            <input type = "text" id="description" name="description" placeholder="Description de demande">
                        </div>
                        <div class = "form-row">
                            <input type = "number" name="duree" placeholder="Combien de jour?" min = "1">
                            <input type = "submit" value = "Demander">


                            <input type="hidden" name="expert_id" value="{{ $expert->id }}">
                            <input type="hidden" name="service_id" value="{{ $serviceExpert->service_id }}">
                            <input type="hidden" name="prix_par_duree" value="{{ $serviceExpert->prix_par_duree }}">
                        </div>
                    </form>
                </div>
          </div>
        </div>
    </div>



    <script>const openModal = document.getElementById('open');
const closeModal = document.getElementById('close');
const modal = document.getElementById('modall-containerr');

openModal.addEventListener('click', () => {
    modal.classList.add('show');
});

closeModal.addEventListener('click', () => {
    modal.classList.remove('show');
});

    </script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
<script>

//
$(".testmonial_slider_area").owlCarousel({
        autoplay: true,
        slideSpeed:1000,
        items : 3,
        loop: true,
        nav:true,
        navText:['<i class="fa fa-arrow-left"></i>','<i class="fa fa-arrow-right"></i>'],
        margin: 30,
        dots: true,
        responsive:{
            320:{
                items:1
            },
            767:{
                items:2
            },
            600:{
                items:3
            },
            1000:{
                items:3
            }
        }

    });

</script>
<script>
    // coding with nick
// vars
'use strict'
var testim = document.getElementById("testim"),
    testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
    testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
    testimleftArrow = document.getElementById("left-arrow"),
    testimRightArrow = document.getElementById("right-arrow"),
    testimSpeed = 4500,
    currentSlide = 0,
    currentActive = 0,
    testimTimer
    ;
// coding with nick
window.onload = function () {

    // Testim Script
    function playSlide(slide) {
        for (var k = 0; k < testimDots.length; k++) {
            testimContent[k].classList.remove("active");
            testimContent[k].classList.remove("inactive");
            testimDots[k].classList.remove("active");
        }
        if (slide < 0) {
            slide = currentSlide = testimContent.length - 1;
        }
        if (slide > testimContent.length - 1) {
            slide = currentSlide = 0;
        }
        if (currentActive != currentSlide) {
            testimContent[currentActive].classList.add("inactive");
        }
        testimContent[slide].classList.add("active");
        testimDots[slide].classList.add("active");

        currentActive = currentSlide;

        clearTimeout(testimTimer);
        testimTimer = setTimeout(function () {
            playSlide(currentSlide += 1);
        }, testimSpeed)
    }
// coding with nick
    testimleftArrow.addEventListener("click", function () {
        playSlide(currentSlide -= 1);
    })
    testimRightArrow.addEventListener("click", function () {
        playSlide(currentSlide += 1);
    })

    for (var l = 0; l < testimDots.length; l++) {
        testimDots[l].addEventListener("click", function () {
            playSlide(currentSlide = testimDots.indexOf(this));
        })
    }
    playSlide(currentSlide);

}
// coding with nick

</script>

</body>
</html>
