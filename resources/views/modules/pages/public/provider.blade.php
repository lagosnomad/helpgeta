@extends('pages::public.master')

@section('page')
    <section>
        <!-- START: PAGE TITLE -->
        <div class="row page-title">
            <div class="container clear-padding text-center flight-title">
                <h3>{!! $page->present()->parentTitle !!}</h3>
                <h4>{!! $page->tagline !!}</h4>
            </div>
        </div>
        <!-- END: PAGE TITLE -->
    </section>
    <section>
        <div class="row about-intro">
            <div class="container clear-padding">
                <div class="col-md-6 col-sm-6 wow slideInLeft">
                    {!! $page->body !!}
                </div>
                <div class="col-md-6 col-sm-6 wow slideInRight">
                    <div class="sign-up-box">
                        <h4>Sign Up</h4>
                        <div class="booking-form">
                            <form>
                                <label>Email</label>
                                <input class="form-control" type="email" name="emailid" placeholder="Enter Your Email" required="">

                                <label>Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Enter Password" required="">

                                <label><input type="checkbox" name="tc"> I agree To Terms &amp; Conditions</label>

                                <button type="submit">REGISTER <i class="fa fa-edit"></i></button>
                            </form>
                            <div style="margin-top:15px">
                                <span class="uppercase bold">Already Registered?</span > Login <a href="{{url('login')}}">here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
