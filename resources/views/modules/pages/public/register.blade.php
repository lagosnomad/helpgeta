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

                            <div class="columns">
                                <div class="column">
                                    <div class="field">
                                        {!! Form::radio('group','Artisan',request()->get('type','provider') == 'provider' ? true : false, ['id'=>'artisan','class'=>'is-checkradio']) !!}
                                        <label for="artisan" class="is-capitalized">I want to provide services</label>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        {!! Form::radio('group','User',request()->get('type') == 'requester' ? true : false,['id'=>'user','class'=>'is-checkradio']) !!}
                                        <label for="user" class="is-capitalized">I want to request for services</label>
                                    </div>
                                </div>
                            </div>

                            <div class="is-divider is-uppercase" data-content="ENTER DETAILS"></div>

                            <div class="columns">
                                <div class="column">
                                   <div class="field">
                                       <label class="label">First Name</label>
                                       <div class="control has-icons-left">
                                           <input name="first_name" class="input" type="text" placeholder="Enter your first name" value="{{old('first_name')}}">
                                           <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                                       </div>
                                   </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                    <label class="label">Last Name</label>
                                    <div class="control has-icons-left">
                                        <input name="last_name" class="input" type="text" placeholder="Enter your last name" value="{{old('last_name')}}">
                                        <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <div class="field">
                                        <label class="label">Email Address</label>
                                        <div class="control has-icons-left">
                                            <input name="email" class="input" type="text" placeholder="Enter your email" value="{{old('email')}}">
                                            <span class="icon is-small is-left"><i class="fa fa-user"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label">Phone Number</label>
                                        <div class="control has-icons-left">
                                            <input name="phone" class="input" type="text" placeholder="Enter your phone number" value="{{old('phone')}}">
                                            <span class="icon is-small is-left"><i class="fa fa-phone"></i></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="columns">
                                <div class="column">
                                    <div class="field">
                                        <label class="label">Password</label>
                                        <p class="control has-icons-left">
                                            <input name="password" class="input" type="password" placeholder="Enter your Password">
                                            <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="field">
                                        <label class="label">Confirm Password</label>
                                        <p class="control has-icons-left">
                                            <input name="confirm_password" class="input" type="password" placeholder="Enter your Password">
                                            <span class="icon is-small is-left"><i class="fa fa-lock"></i></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="field">
                                <div class="control">
                                    <button class="button is-primary is-medium is-6" type="submit">
                                        Create Account
                                    </button>
                                </div>
                                <p class="help">Creating an account signifies you’ve read and agree to our
                                    <a href="{{url('terms-and-conditions')}}">Terms of Service</a> and <a href="{{url('privacy-policy')}}">Privacy Policy</a></p>
                            </div>

                            <div class="field has-text-centered">
                                <hr>
                                <a href="#">Already Registered? Sign In</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
