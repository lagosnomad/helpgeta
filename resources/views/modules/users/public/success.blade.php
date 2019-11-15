@extends('pages::public.master')

@section('page')

    <section class="section bg-grey" id="page-login">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-6">
                    <div class="card border-radius-10">

                        <div class="card-content has-text-centered">
                            <div class="notification is-success has-text-centered">
                                <p class="title is-2 is-spaced">Registration Successful</p>
                                <p class="subtitle is-5">
                                    Thank you for registering, Your account has been created, check your email for the confirmation link
                                </p>
                                <hr>
                                <a href="{{url('login')}}" class="button is-inverted is-medium">Continue</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
