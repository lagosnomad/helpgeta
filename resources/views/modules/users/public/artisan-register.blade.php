@extends('core::public.master')

@section('title', 'Become a Service Provider' . $websiteTitle)
@section('ogTitle', 'Services' . $websiteTitle)

@section('main')
    <section class="section bg-grey" id="page-login">
        <div class="container">
            <div class="columns">
                <div class="column is-6 vertical-middle">
                    <div class="main-heading has-text-left">
                        <p>Join Our Amazing Community </p>
                        <h1 class="title is-3 is-spaced">Become a  <span>Service Provider</span></h1>
                    </div>
                    <div class="has-margin-t-5">
                        @include('pages::public._work-process-artisan')
                    </div>
                </div>
                <div class="column is-6">
                    <div class="card border-radius-10">
                        {{--<header class="card-header main-heading is-marginless">
                            <h2 class="card-header-title is-size-4">Join Helpgeta Today</h2>
                            <div class="card-header-icon">
                                <span class="icon"><i class="fa fa-plus-circle"></i></span>
                            </div>
                        </header>--}}
                        <div class="card-content">
                            @include('core::public._partials.notify')
                            {!! Form::open(['route'=>'register.post']) !!}
                                @include('users::public._register-form',['type'=>'Artisan'])
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop