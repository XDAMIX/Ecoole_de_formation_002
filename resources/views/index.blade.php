@extends('layouts.master')
@section('content')
    <main id="main">


        <!-- ======= About Us Section ======= -->
        <section id="ecole" class="ecole">
            <div class="section-title">
                <h2>A PROPOS DE NOUS</h2>
            </div>
            <div class="container-fluid" data-aos="fade-up">
                @foreach ($paragraphes as $paragraphe)
                    <div class="row" style="padding-bottom: 50px;">

                        <div class="col-md-12 section-title">

                            <h2 class="h2-theme">{{ $paragraphe->titre }}</h2>

                        </div>


                        <div class="col-lg-6" data-aos="fade-right">

                            <img src="{{ url('storage/' . $paragraphe->photo) }}" class="img-fluid" alt="">

                        </div>

                        <div class="col-lg-6 pt-4 pt-lg-0 content" data-aos="fade-left">

                            <h2 class="s-titre">{{ $paragraphe->sous_titre }}</h2>

                            <p class="texte">{{ $paragraphe->paragraphe }}</p>


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
            <div class="container-fluid" data-aos="fade-up">

                <div class="row">
                    <div class="section-title col-12">
                        <h2>Témoignages</h2>
                    </div>

                    <div class="testimonials-slider swiper col-12" data-aos="fade-left" data-aos-delay="100">
                        <div class="swiper-wrapper">

                            @foreach ($temoignages as $temoignage)
                                <!-- testimonial item -->
                                <div class="swiper-slide">
                                    <div class="testimonial-item">
                                        <p>
                                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                            {{ $temoignage->mot }}
                                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                                        </p>
                                        <img src="{{ 'storage/' . $temoignage->photo }}" class="testimonial-img"
                                            alt="">
                                        <h3>{{ $temoignage->nom }}</h3>
                                        <h4>{{ $temoignage->poste }}</h4>
                                    </div>
                                </div>
                                <!-- End testimonial item -->
                            @endforeach

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>

            </div>
        </section>
        <!-- End Testimonials Section -->









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
                                    <a href="">{{ $informations->email }}</a>
                                </div>
                            </div>

                            <div class="col-12" data-aos="flip-right">
                                <div class="info-box mt-4">
                                    <i class="bx bx-phone-call"></i>
                                    <h3>Appellez Nous</h3>
                                    @foreach ($telephones as $telephone)
                                        <p>{{ $telephone->operateur }} : <a href="">{{ $telephone->numero }}</a>
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
                                    <button type="submit" class="form-control btn btn-success">Envoyer le
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
                                        <i class="fas fa-users"></i>
                                        <span data-purecounter-start="0" data-purecounter-end="10"
                                            data-purecounter-duration="1" class="purecounter"></span>

                                        <p><strong>FORMATEURS</strong> consequuntur quae qui deca rode</p>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 d-md-flex align-items-md-stretch">
                                    <div class="count-box">
                                        <i class="far fa-building"></i>
                                        <span data-purecounter-start="0" data-purecounter-end="15"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>FORMATIONS</strong> adipisci atque cum quia aut numquam delectus</p>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 d-md-flex align-items-md-stretch">
                                    <div class="count-box">
                                        <i class="fa fa-graduation-cap"></i>
                                        <span data-purecounter-start="0" data-purecounter-end="150"
                                            data-purecounter-duration="1" class="purecounter"></span>
                                        <p><strong>STAGIAIRES</strong> aut commodi quaerat. Aliquam ratione</p>
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
                Designed by <a href="#">Infinity-Concepts</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->










    <!-- <div id="preloader"></div> -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
@endsection
