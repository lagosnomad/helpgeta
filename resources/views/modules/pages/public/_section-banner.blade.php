<section class="banner-section" style="background-image:url({{asset('assets/public/img/banner.jpg')}});">
    <div class="container">
        <div class="columns is-centered">
            <div class="column is-10">
                <div class="banner-caption has-text-centered">
                    <h2 class="title is-2 is-spaced">Work with Help Geta. Work Smart.</h2>
                    <p class="subtitle is-5">Getting help shouldn’t be so frustrating, at HelpGeta we understand that and ensure that the process
                        is seamless</p>
                    <a href="{{url('register').'?type=provider'}}" class="button is-primary is-large is-spaced mr-1-tablet">
                         	I want to provide services
                    </a>
                    <a href="{!! route('categories') !!}" class="button is-for-banner is-large">
                         I want to request for services
                    </a>
                </div>
                @include('pages::public._widget-stats')
            </div>
        </div>
    </div>
</section>