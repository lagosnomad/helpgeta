<footer class="footer bg-black">
    <div class="footer-middle">
        <div class="container">
            <div class="columns">
                <div class="column is-5">

                    <figure>
                        <img src="{{asset('assets/public/img/logo-white.png')}}" alt="Helpgeta Logo">
                    </figure>
                    <p class="has-margin-b-5">We are here to provide whatever you need to simplify your everyday activities or starting a new project,
                        no matter your budget, we will find services based on your goals and deadlines, it’s that simple and
                        ensure your work is done on time having in mind your payment is always secure, Helpgeta is built to
                        have your best interest at heart</p>
                    <a href="{{url('about-us')}}" class="button is-primary">   More About Us</a>

                </div>
                <div class="column">
                    <h3 class="title is-5 is-uppercase">About Us</h3>
                    <ul class="footer-links-list">
                        {!! Menus::render('company') !!}
                    </ul>
                </div>

                <div class="column">
                    <h3 class="title is-5 is-uppercase">Support</h3>
                    <ul class="footer-links-list">
                        {!! Menus::render('support') !!}
                    </ul>
                </div>

                <div class="column">
                    <h3 class="title is-5 is-uppercase">MORE </h3>
                    <ul class="footer-links-list">
                        {!! Menus::render('more') !!}
                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="footer-base has-text-centered">
            <h3 class="title is-5 is-uppercase">Follow Us </h3>
            <ul class="is-inline-flex footer-social-icons">
                <li>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li>
                    <a href="https://twitter.com/helpgeta"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/helpgeta_/"><i class="fa fa-instagram"></i></a>
                </li>
            </ul>
            <div class="copyrights">©  Copyright 2018 by <a href="#">Help Geta</a>. All Rights Reserved.</div>
        </div>
    </div>
</footer>