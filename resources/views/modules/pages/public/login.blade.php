@extends('pages::public.master')

@section('page')

    <section class="section bg-grey" id="page-login">
        <div class="container">
            <div class="columns is-centered">
                <div class="column is-4">
                    <div class="card border-radius-10">
                        <header class="card-header main-heading is-marginless">
                            <h2 class="card-header-title">{{$page->title}}</h2>
                            <div class="card-header-icon">
                                <span class="icon"><i class="fa fa-lock"></i></span>
                            </div>
                        </header>
                        <div class="card-content">
                            {!! $page->body !!}
                            @include('core::public._partials.notify')
                            {!! Form::open(['route'=>'login.post']) !!}
                                <div class="field">
                                    <label class="label">Email Address</label>
                                    <div class="control has-icons-left">
                                        <input name="email" class="input" type="text" placeholder="Enter your username" value="{{old('email')}}">
                                        <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>
                                <div class="field">
                                    <label class="label">Password</label>
                                    <p class="control has-icons-left">
                                        <input name="password" class="input" type="password" placeholder="Enter your Password">
                                        <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                                    </p>
                                </div>
                                <div class="field is-clearfix">
                                    <div class="control is-pulled-right">
                                        <a href="#">Forgot your password?</a>
                                    </div>
                                </div>
                                <div class="field has-text-centered">
                                    <div class="control">
                                        <button class="button is-primary is-medium w-full" type="submit">
                                            Login
                                        </button>
                                    </div>
                                    <hr>
                                    <a href="{{url('register')}}">Not Registered? Sign Up</a>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
