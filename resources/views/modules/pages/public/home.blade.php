@extends('pages::public.master')

@section('page')

    <section class="banner-section">
        <!--<div class="banner-item" style="background-image:url({{asset('assets/public/img/banner.jpg)">
        </div>')}}-->
        <div class="container">
            <div class="columns">
                <div class="column is-7 is-hidden-mobile">
                    <img src="{{asset('assets/public/img/banner1.png')}}" alt="">
                </div>
                <div class="column is-5">
                    <div class="banner-caption">
                        <h2 class="title is-2 is-spaced">Learn Fashion Design from Industry Pros</h2>
                        <p class="subtitle is-5">Choose from 1,000s of hours of content, from Pattern Illustration to Draftin, Learn to make designs and get the skills you need to be that fashion designer you aspire to be.</p>
                        <a class="button is-info is-medium is-spaced mr-1-tablet">Get Started</a>
                        <a class="button is-primary is-medium">Browse</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section bg-grey">
        <div class="container">
            <div class="has-text-centered" style="margin-bottom:2rem">
                <h2 class="title is-3 is-spaced">Start Learning </h2>
                <p class="subtitle is-5">Learn to make designs and get the skills you need to be that fashion designer you aspire to be.</p>
            </div>
            <div class="columns" id="category-listing">
                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <figure>
                                <img src="{{asset('assets/public/img/icons/white/sewing.png')}}" alt="">
                                <figcaption>
                                    <span class="title is-6">Sewing</span>
                                    <br>
                                    <span class="subtitle is-7"><strong>10</strong> Videos</span>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <figure>
                                <img src="{{asset('assets/public/img/icons/white/bridal.png')}}" alt="">
                                <figcaption>
                                    <span class="title is-6">Bridal</span>
                                    <br>
                                    <span class="subtitle is-7"><strong>10</strong> Videos</span>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <figure>
                                <img src="{{asset('assets/public/img/icons/white/pattern.png')}}" alt="">
                                <figcaption>
                                    <span class="title is-6">Pattern Making</span>
                                    <br>
                                    <span class="subtitle is-7"><strong>10</strong> Videos</span>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>


                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <figure>
                                <img src="{{asset('assets/public/img/icons/white/accessories.png')}}" alt="">
                                <figcaption>
                                    <span class="title is-6">Accessiories</span>
                                    <br>
                                    <span class="subtitle is-7"><strong>10</strong> Videos</span>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <figure>
                                <img src="{{asset('assets/public/img/icons/white/business.png')}}" alt="">
                                <figcaption>
                                    <span class="title is-6">Fashion Business</span>
                                    <br>
                                    <span class="subtitle is-7"><strong>10</strong> Videos</span>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <figure>
                                <img src="{{asset('assets/public/img/icons/white/embellishment.png')}}" alt="">
                                <figcaption>
                                    <span class="title is-6">Embellishment</span>
                                    <br>
                                    <span class="subtitle is-7"><strong>10</strong> Videos</span>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="section" id="series-listing">
        <div class="container">
            <div class="tabs is-centered is-toggle">
                <ul>
                    <li class="is-active"><a href="#">Getting Started</a></li>
                    <li><a href="#">Learning Path</a></li>
                    <li><a href="#">Most Popular</a></li>
                </ul>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="card series-item">
                        <div class="card-image">
                            <span class="badge">Sewing</span>
                            <div class="overlay"></div>
                            <figure class="image">
                                <img src="{{asset('assets/public/img/videos/1.jpg')}}" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <h3 class="title">Intro To Needles, Pins, Thimbles & Pincushions</h3>
                            <p class="lecturer">Olutoki Olajuwon</p>
                        </div>
                        <footer class="card-footer">
                            <p class="card-footer-item is-size-7">6 Lessons</p>
                            <p class="card-footer-item is-size-7">50m 10s</p>
                            <p class="card-footer-item is-size-7">Beginner</p>
                        </footer>
                    </div>
                </div>
                <div class="column">
                    <div class="card series-item">
                        <div class="card-image">
                            <span class="badge">PAttern MAking</span>
                            <div class="overlay"></div>
                            <figure class="image">
                                <img src="{{asset('assets/public/img/videos/2.jpg')}}" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <h3 class="title">Pivot Front Shoulder Dart to Side Seam Dart</h3>
                            <p class="lecturer">Olutoki Olajuwon</p>
                        </div>
                        <footer class="card-footer">
                            <p class="card-footer-item is-size-7">6 Lessons</p>
                            <p class="card-footer-item is-size-7">50m 10s</p>
                            <p class="card-footer-item is-size-7">Beginner</p>
                        </footer>
                    </div>
                </div>
                <div class="column">
                    <div class="card series-item">
                        <div class="card-image">
                            <span class="badge">Sewing</span>
                            <div class="overlay"></div>
                            <figure class="image">
                                <img src="{{asset('assets/public/img/videos/4.jpg')}}" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <h3 class="title">Machine Foot Baby Hem</h3>
                            <p class="lecturer">Olutoki Olajuwon</p>
                        </div>
                        <footer class="card-footer">
                            <p class="card-footer-item is-size-7">6 Lessons</p>
                            <p class="card-footer-item is-size-7">50m 10s</p>
                            <p class="card-footer-item is-size-7">Beginner</p>
                        </footer>
                    </div>
                </div>
                <div class="column">
                    <div class="card series-item">
                        <div class="card-image">
                            <span class="badge">Bridal</span>
                            <div class="overlay"></div>
                            <figure class="image">
                                <img src="{{asset('assets/public/img/videos/3.jpg')}}" alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content">
                            <h3 class="title">Intro To Needles, Pins, Thimbles & Pincushions</h3>
                            <p class="lecturer">Olutoki Olajuwon</p>
                        </div>
                        <footer class="card-footer">
                            <p class="card-footer-item is-size-7">6 Lessons</p>
                            <p class="card-footer-item is-size-7">50m 10s</p>
                            <p class="card-footer-item is-size-7">Beginner</p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section bg-grey">
        <div class="container">
            <div id="testimonials">
                <div class="columns is-centered">
                    <div class="column is-8">
                        <div class="quote">
                            <img src="{{asset('assets/public/img/quote-2.png')}}" alt="">
                            <p class="subtitle is-4">
                                Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie
                            </p>
                        </div>
                    </div>
                </div>
                <div class="columns is-centered">
                    <div class="column is-9">
                        <div class="media" style="float:right">
                            <div class="media-content">
                                <p><strong>Oduguwa Adedolapo</strong></p>
                                <p>Student</p>
                            </div>
                            <div class="media-right">
                                <figure class="image is-48x48">
                                    <img src="{{asset('assets/public/img/avatar.jpg')}}" alt="Placeholder image">
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section call-out-box">
        <div class="container">
            <div class="content has-text-centered">
                <h2 class="title is-3 is-spaced">Learn Something New Today</h2>
                <p class="subtitle is-5">
                    Le Lorem Ipsum est simplement du faux texte employé dans brla composition et la mise en page
                    <br> avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500
                    <br> quand un peintre anonyme assembla ensemble des morceaux de texte </p>
                <a href="" class="button is-primary is-outlined is-large">Get Started</a>
            </div>
        </div>
    </section>

@endsection

