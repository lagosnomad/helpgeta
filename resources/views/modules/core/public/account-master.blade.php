@extends('core::public.master')

@section('title', 'My Account')
@section('description','')

@section('main')
    @include('core::public._partials.notify')

    <section class="section account-page">
        <div class="container">
            <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
                <ul>
                    <li><a href="{!! url('/') !!}">Home</a></li>
                    <li class="is-active"><a href="#" aria-current="page">My Account</a></li>
                </ul>
            </nav>
            @if($user->hasRoleName('Artisan') && isset($user->artisan))
                @if(!$user->artisan->is_activated)
                    <article class="message is-danger">
                        <div class="message-body">Your account is pending activation, your services would not be listed yet, contact us on
                            the status of your activation.</div>
                    </article>

                @endif
            @endif
            <div class="page-heading is-marginless is-borderless">
                <div class="level">
                    <div class="level-left">
                        @include('users::public._account-title')
                    </div>
                    <div class="level-right">
                        @include('users::public._stats')
                    </div>
                </div>
            </div>

            <div class="page-content">
                @include('core::public._account-sidebar')

                <div class="content">
                    @yield('page')
                </div>
            </div>
        </div>
    </section>

@stop