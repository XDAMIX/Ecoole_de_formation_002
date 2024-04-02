@extends('layouts.master')
@section('content')
    <main id="main">


        <!-- ======= About Us Section ======= -->
        <section id="ecole" class="ecole">
            <div class="section-title">
                <h2>A PROPOS DE NOUS</h2>
            </div>
            <div class="container" data-aos="fade-up">
                @foreach ($paragraphes as $paragraphe)
                    <div class="row presentation" style="padding-bottom: 50px;">

                        <div class="col-12 section-title">
                            <h3 class="h2-theme">{{ $paragraphe->titre }}</h3>
                        </div>

                        <div class="row">

                            <div class="col-lg-6 col-md-6 col-12 order-1" data-aos="fade-right"
                                style="background-image: url({{ asset('storage/' . $paragraphe->photo) }} );background-size: cover;background-position: center;background-repeat: no-repeat;  height:450px;"
                                id="partie1_{{ $loop->iteration }}">
                            </div>

                            <div class="col-lg-6 col-md-6 col-12 order-2" data-aos="fade-left" style="padding: 20px;"
                                id="partie2_{{ $loop->iteration }}">
                                <h2 class="s-titre text-center">{{ $paragraphe->sous_titre }}</h2>

                                <div class="truncate-text" id="truncate-text{{ $paragraphe->id }}">
                                    <p class="texte">{{ $paragraphe->paragraphe }}</p>

                                    {{-- expand button  --}}
                                    <button id="truncate-button{{ $paragraphe->id }}" class="btn btn-light" onclick="toggleText({{ $paragraphe->id }})">voir plus</button>
                                </div>
                            </div>

                        </div>

                    </div>
                @endforeach


            </div>
        </section>
        <!-- End About Us Section -->














        <!-- ======= formations Section ======= -->
        <section id="formations" class="section-news section-t8">
            <div class="section-title">
                <h2>FORMATIONS</h2>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-wrap d-flex justify-content-between">
                            <div class="title-box">
                                <h2 class="h2-theme titre">LISTE DES FORMATIONS</h2>
                            </div>
                            <div class="title-link">
                                {{-- Ajouter le lien liste de tout les formations --}}
                                <a href="{{ url('/formations') }}" class="s-titre">Voir Tout<span
                                        class="bi bi-chevron-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="news-carousel" class="swiper">
                    <div class="swiper-wrapper">


                        @foreach ($formations as $formation)
                            <div class="carousel-item-c swiper-slide">
                                <div class="card-box-b card-shadow news-box">
                                    <div class="img-box-b">
                                        <img src="{{ asset('storage/' . $formation->photo) }}" alt="image-formation"
                                            class="img-b img-fluid">
                                    </div>
                                    <div class="card-overlay">
                                        <div class="card-header-b">
                                            {{-- <div class="card-category-b">
                    <a href="{{ url('/voirplus/'.$formation->id )}}" class="link-a">Voir Plus<span class="bi bi-chevron-right"></span></a>
                  </div> --}}
                                            <div class="card-title-a">
                                                <h2 class="title-2">{{ $formation->titre }}</h2>
                                            </div>
                                            <div class="card-title-a">
                                                <a> {{ $formation->dure }} </a>
                                            </div>
                                            <div class="div-boutton">
                                                <a href="{{ url('/inscription/' . $formation->id) }}"
                                                    class="btn-inscription">Inscription</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End carousel item -->
                        @endforeach


                    </div>
                </div>

                <div class="news-carousel-pagination carousel-pagination"></div>
            </div>
        </section>
        <!-- End Latest News Section -->







        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">

            <div class="section-title">
                <h2>Témoignages</h2>
            </div>

            <div class="container" style="height:500px;">

                <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100" style="height:500px;">
                    <div class="swiper-wrapper" style="height:500px;">

                        @foreach ($temoignages as $temoignage)
                            <!-- testimonial item -->
                            <div class="swiper-slide" style="height:500px;">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item">
                                        <img src="{{ 'storage/' . $temoignage->photo }}" class="testimonial-img"
                                            alt="">
                                        <h3>{{ $temoignage->nom }}</h3>
                                        <h4>{{ $temoignage->poste }}</h4>
                                        <p style="font-size: 12px !important;">
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            {{ $temoignage->mot }}
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- End testimonial item -->
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Testimonials Section -->













        <!-- ======= Frequently Asked Questioins Section ======= -->
        <section id="faq" class="faq section-bg">
            <div class="section-title">
                <h2>Foire aux questions</h2>
            </div>
            <div class="container" data-aos="fade-up">


                <ul class="faq-list">

                    @foreach ($questions as $question)
                        <li>
                            <div data-bs-toggle="collapse" class="collapsed question" href="{{ '#faq' . $question->id }}">
                                {{ $question->question }}<i class="bi bi-chevron-down icon-show"></i><i
                                    class="bi bi-chevron-up icon-close"></i></div>
                            <div id="{{ 'faq' . $question->id }}" class="collapse" data-bs-parent=".faq-list">
                                <p>{{ $question->reponse }}</p>
                            </div>
                        </li>
                    @endforeach

                </ul>

            </div>
        </section>
        <!-- End Frequently Asked Questioins Section -->










        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="section-title">
                <h2>Contact</h2>
            </div>


            <div class="container" style="text-align: center;">
                <div class="row">
                    <div class="col-12 col-md-6" data-aos="flip-right">
                        <div class="info-box">
                            <i class="bx bx-map"></i>
                            <h3>Adresse</h3>
                            <p>{{ $informations->adresse }}</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-6" data-aos="flip-right">
                        <iframe style="border:0; width: 100%; height: 350px;" src="{{ $informations->localisation }}"
                            frameborder="0" allowfullscreen></iframe>

                    </div>
                </div>
            </div>

            <div class="container">

                <div class="row">

                    <div class="col-12 col-md-6" style="background-color: #ffff;">

                        <div class="row">

                            <div class="col-12" data-aos="flip-right">
                                <div class="info-box mt-4">
                                    <i class="bx bx-envelope"></i>
                                    <h3>Email</h3>
                                    <a href="mailto:{{ $informations->email }}">{{ $informations->email }}</a>
                                </div>
                            </div>

                            <div class="col-12" data-aos="flip-right">
                                <div class="info-box mt-4">
                                    <i class="bx bx-phone-call"></i>
                                    <h3>Appellez Nous</h3>
                                    @foreach ($telephones as $telephone)
                                        <p>{{ $telephone->operateur }} : <a
                                                href="tel:{{ $telephone->numero }}">{{ $telephone->numero }}</a>
                                        </p> <br>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="col-12 col-md-6 info-box mt-4" data-aos="flip-left"
                        style="background-color: #ffff;padding: 20px;">

                        <form action="{{ url('/message') }}" method="post" class="email-form">
                            @csrf
                            <div class="row">

                                <div class="col-12 titre-message">
                                    <i class="bx bx-send"></i>
                                    <h3>Contactez-nous par message</h3>
                                </div>

                                <div class="col form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Votre Nom" required>
                                </div>

                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Votre Email" required>
                                </div>

                                <div class="col form-group">
                                    <input type="text" class="form-control" name="tel" id="tel"
                                        placeholder="Votre n° de téléphone" required>
                                </div>

                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="subject" id="subject"
                                        placeholder="Sujet" required>
                                </div>

                                <div class="form-group mt-3">
                                    <textarea class="form-control" name="texte" rows="5" placeholder="Message" required></textarea>
                                </div>

                                <div class="form-group" style="margin-top: 10px;text-align:center;">
                                    <button type="submit" class="form-control btn btn-inscription">Envoyer le
                                        message</button>
                                </div>
                        </form>
                    </div>

                </div>

            </div>
        </section>
        <!-- End Contact Section -->

    </main>
    <!-- End #main -->










    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-12 col-md-12" style="text-align: center;">
                        <div class="footer-info">
                            <h3>{{ $informations->nom }}</h3>
                            <p>
                                Rejoignez Nous <br>
                                sur<br><br>
                                <!-- <strong>Phone:</strong> +1 5589 55488 55<br>
                                <strong>Email:</strong> info@example.com<br> -->
                            </p>
                            <div class="social-links mt-3" data-aos="flip-up">
                                @foreach ($liens as $lien)
                                    @if ($lien->reseau_social == 'Twitter' && $lien->lien !== '')
                                        <a href="{{ $lien->lien }}" target="_blank" class="twitter"><i
                                                class="bx bxl-twitter"></i></a>
                                    @endif
                                    @if ($lien->reseau_social == 'Facebook' && $lien->lien !== '')
                                        <a href="{{ $lien->lien }}" target="_blank" class="facebook"><i
                                                class="bx bxl-facebook"></i></a>
                                    @endif
                                    @if ($lien->reseau_social == 'Instagram' && $lien->lien !== '')
                                        <a href="{{ $lien->lien }}" target="_blank" class="instagram"><i
                                                class="bx bxl-instagram"></i></a>
                                    @endif
                                    @if ($lien->reseau_social == 'Youtube' && $lien->lien !== '')
                                        <a href="{{ $lien->lien }}" target="_blank" class="Youtube"><i
                                                class="bx bxl-youtube"></i></a>
                                    @endif
                                    @if ($lien->reseau_social == 'Linkedin' && $lien->lien !== '')
                                        <a href="{{ $lien->lien }}" target="_blank" class="linkedin"><i
                                                class="bx bxl-linkedin"></i></a>
                                    @endif
                                    @if ($lien->reseau_social == 'Tiktok' && $lien->lien !== '')
                                        <a href="{{ $lien->lien }}" target="_blank" class="tiktok"><i
                                                class="bx bxl-tiktok"></i></a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>



                    <!-- ======= Counts Section ======= -->
                    <section id="counts" class="counts">
                        <div class="container-fluid" data-aos="fade-up">

                            <div class="row no-gutters">

                                <div class="col-lg-4 col-md-4 d-md-flex align-items-md-stretch">
                                    <div class="count-box">
                                        <i class="bi bi-building"></i>
                                        <span data-purecounter-start="0" data-purecounter-end="{{ $nb_formations }}"
                                            data-purecounter-duration="1" class="purecounter"></span>

                                        <p><strong>FORMATION SPÉCIALISÉE</strong> offerte au sein de notre établissement.
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 d-md-flex align-items-md-stretch">
                                    <div class="count-box">
                                        <i class="bi bi-people-fill"></i>
                                        <span data-purecounter-start="0" data-purecounter-end="{{ $nb_stagiaires }}"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>CANDIDATS EN FORMATION</strong> accueillis avec enthousiasme par notre
                                            école.</p>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 d-md-flex align-items-md-stretch">
                                    <div class="count-box">
                                        <i class="bi bi-award"></i>
                                        <span data-purecounter-start="0" data-purecounter-end="{{ $nb_diplomes }}"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>CERTIFICATIONS</strong> attribuées par notre établissement de formation.
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </section>
                    <!-- End Counts Section -->




                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="copyright">
                &copy; Copyright <strong><span>{{ $informations->nom }}</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="#">bitech-dz</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->










    <!-- <div id="preloader"></div> -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection





<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Sélectionner tous les éléments avec la classe 'presentation'
        var presentations = document.querySelectorAll('.presentation');

        var i = 1;
        var currentOrder = '1';

        presentations.forEach(function(presentation) {

            console.log("Changement d'ordre " + i);

            i++;
            
            

            var partie1 = presentation.querySelector('[id^="partie1_"]');
            var partie2 = presentation.querySelector('[id^="partie2_"]');
            
   
            var activated = 'non';

  
            function changeOrder() {
                
                if (currentOrder === '1' && activated === 'non') {
                    partie1.classList.remove('order-1');
                    partie1.classList.add('order-2');
                    partie2.classList.remove('order-2');
                    partie2.classList.add('order-1');
                    currentOrder = '2';
                    activated = 'oui';
                    console.log(currentOrder);
                } else if (currentOrder === '2' && activated === 'non') {
                    partie1.classList.remove('order-2');
                    partie1.classList.add('order-1');
                    partie2.classList.remove('order-1');
                    partie2.classList.add('order-2');
                    currentOrder = '1';
                    activated = 'oui';
                    console.log(currentOrder);
                }
            }

            // Appeler la fonction pour changer l'ordre lors du chargement de la page
            changeOrder();
        });
    });
</script>









{{-- ---------------------------------------------------------------------------------------------------- --}}

<script>
    function toggleText(id) {
        console.log("***ToggleText function called***");
        console.log('id : ' + id);

        var element = document.querySelector("#truncate-text" + id);
        var bouton = document.querySelector("#truncate-button" + id);

        if (element) {
            element.classList.toggle("expanded");
            if(bouton.textContent == 'voir plus'){
                
                bouton.textContent = "voir moin";
            }
            else {
                
                bouton.textContent = "voir plus";
            }
            console.log("L'élément a été trouvé et la classe est switché");
        } else {
            console.error();
            ("L'élément n'a pas été trouvé.");
        }
    }
</script>

{{-- ---------------------------------------------------------------------------------------------------- --}}
<style>
    .truncate-text .texte {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 300;
        /* Limit to three lines */
        -webkit-box-orient: vertical;
        max-height: calc(6em * 3);
        /* Adjust the line height accordingly */
        transition: max-height 0.3s ease;
        /* Add a smooth transition effect */
    }

    .truncate-text.expanded .texte {
        max-height: none;
        -webkit-line-clamp: 500;
        /* Allow the full height for the expanded state */
    }

    .truncate-text.expanded button {
        display: inline-block;
        /* Hide the "Lire la suite" button by default */
    }

    .truncate-text button {
        display: inline-block;
        /* Display the "Lire la suite" button in expanded mode */
    }
</style>
{{-- ---------------------------------------------------------------------------------------------------- --}}
