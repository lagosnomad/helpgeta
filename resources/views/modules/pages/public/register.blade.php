@extends('pages::public.master')

@section('page')

    <section class="section bg-grey" id="page-login">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-6">
                    <div class="card border-radius-10">
                        <header class="card-header main-heading is-marginless">
                            <h2 class="card-header-title">{{$page->title}}</h2>
                            <div class="card-header-icon">
                                <span class="icon"><i class="fa fa-plus-circle"></i></span>
                            </div>
                        </header>
                        <div class="card-content">
                            {!! $page->body !!}
                            @include('core::public._partials.notify')
                            {!! Form::open(['route'=>'register.post']) !!}


                            @include('users::public._register-form',['type'=>'User'])

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
