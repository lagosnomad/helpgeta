@extends('pages::public.master')
@section('page')

    @include('pages::public._page-banner-section')

    <main id="tg-main" class="tg-main tg-haslayout tg-white">
        <div class="container">
            <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns">
                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                        <div id="tg-content" class="tg-content">
                            <div class="tg-companyoverview">

                                @include('pages::public._page-content')
                                <div class="tg-box"></div>
                                <div class="tg-box">
                                    <div class="tg-boxtitle">
                                        <h3>Our Vision</h3>
                                    </div>
                                    <div class="tg-description">
                                        <p>To be the leader in quality healthcare solutions in West Africa</p>
                                    </div>
                                </div>
                                <div class="tg-box">
                                    <div class="tg-boxtitle">
                                        <h3>Our Mission</h3>
                                    </div>
                                    <div class="tg-description">
                                        <p>We deliver innovative healthcare solutions, create unique customer experiences and promote life & wellbeing through sustainable partnerships</p>
                                    </div>
                                </div>
                                <div class="tg-box">
                                    <div class="tg-boxtitle">
                                        <h3>Core Values</h3>
                                    </div>
                                    <div class="tg-description">
                                        <p>Quality, Value for Life, Integrity, Passion, Professionalism</p>
                                    </div>
                                </div>
                                <div class="tg-box">
                                    <div class="tg-bg-watermark" style="padding:30px; margin-top:20px;">
                                        <img src="{{asset('assets/img/about/jnci-division.png')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
                        <aside id="tg-sidebar" class="tg-sidebar">
                            @include('pages::public._related_pages')
                            @include('pages::public._brochure')
                            @include('pages::public._contact')
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop