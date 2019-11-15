@extends('pages::public.master')
@section('main')

    @include('pages::public._page-banner-section')

    <main id="tg-main" class="tg-main tg-haslayout tg-white">
        <!--************************************
                Contact Us Start
        *************************************-->
        <div class="container">
            <div class="row">
                <div id="tg-twocolumns" class="tg-twocolumns">
                    <div class="tg-contactus">
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 pull-right">
                            <div id="tg-content" class="tg-content">
                                <div class="tg-sectionhead">
                                    <div class="tg-sectiontitle text-left">
                                        <h2>Keep In Touch</h2>
                                    </div>
                                    <div class="tg-description text-left">
                                        <p>At JNC International, we cherish your kind feedback. We have a dedicated team available to respond and treat your enquiries, requests, complaints, sales and technical queries. Kindly fill the form below:</p>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                @include('core::public._partials.notify')
                                {!! Form::open(array('route' => 'contact.post','class'=>'tg-formtheme tg-formcontactus','novalidate'=>'novalidate')) !!}

                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    {!! Form::select('type',
                                                    ['feedback'=>'Feedback','complaint'=>'Complaint','technical-queries'=>'Technical Queries'],
                                                    request()->get('type') ,
                                                    ['class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    {!!Form::text('name',null,['placeholder'=>"Full Name (Required)",'minlength'=>4,'required','class'=>'form-control'])!!}
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    {!!Form::email('email',null,['placeholder'=>"Email Address (Required)",'required','class'=>'form-control'])!!}
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    {!!Form::text('phone',null,['placeholder'=>"Phone Number (Required)",'class'=>'form-control'])!!}
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    {!!Form::text('subject',null,['placeholder'=>"Subject",'class'=>'form-control'])!!}
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    {!!Form::textarea('message',null,['cols'=>30, 'row'=>7, 'placeholder'=>'Message','required','class'=>'form-control'])!!}
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <button class="tg-btnregular tg-active" type="submit">send</button>
                                            </div>
                                        </div>
                                    </fieldset>

                                {!!Form::close()!!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-left">
                            <aside id="tg-sidebar" class="tg-sidebar">
                                <div class="tg-sectionhead">
                                    <div class="tg-sectiontitle text-left">
                                        <h2>Contact Detail</h2>
                                    </div>
                                    {{--<div class="tg-description text-left">
                                        <p>Adipisicing elit, sed do eiusmod tempor incidunt labore et dolore magna aliqua.</p>
                                    </div>--}}
                                </div>

                                <div class="tg-map-holder">
                                    <div class="tg-activelocationmap"></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="spacer30"></div>

                                <ul class="tg-contactinfo">
                                    <li>
                                        <span class="tg-infotitle">Address :</span>
                                        <address>30 Raymond Njoku Street Off Awolowo Road, South-West Ikoyi, Lagos.</address>
                                    </li>
                                    <li>
                                        <span class="tg-infotitle">Phone :</span>
                                        <div class="tg-detailbox">
                                            <span class="tg-phone">+234-814138 0622</span>
                                            <span class="tg-fax">+234-810100 0020</span>
                                        </div>
                                    </li>
                                    <li>
                                        <span class="tg-infotitle">Email :</span>
                                        <div class="tg-detailbox">
                                            <span class="tg-complaint"><a href="mailto:complaint@domain.com">info@jnciltd.com</a></span>
                                        </div>
                                    </li>
                                </ul>
                                <div class="tg-follow">
                                    <span class="tg-infotitle">Follow :</span>
                                    <ul class="tg-socialicons">
                                        <li class="tg-facebook"><a href="{{ config('myapp.facebook') }}"><i class="fa fa-facebook"></i></a></li>
                                        <li class="tg-twitter"><a href="{{ config('myapp.twitter') }}"><i class="fa fa-twitter"></i></a></li>
                                        <li class="tg-linkedin"><a href="{{ config('myapp.linkedin') }}"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************
                Contact Us End
        *************************************-->


    </main>

@stop