@extends('core::public.account-master')

@section('title','My Account')


@section('css')

@stop

@section('js')

@stop

@section('page')

    <div class="main-heading account-heading">
        <h3>My <span>Profile</span></h3>
    </div>
    <div class="has-padding-l-6 has-no-padding-l-mobile">
        {!! Form::model($model,['route'=>'profile.update','files'=>true]) !!}
        @include('users::public._panel-avatar')
        @include('users::public._panel-basic')
        @if($model->hasRoleName('Artisan'))
            @include('users::public._panel-categories')
            @include('users::public._panel-bank-information')
            @include('users::public._panel-guarantor')
            @include('users::public._panel-identification')
            {{--@include('users::public._panel-certifications')--}}
        @endif
        @include('users::public._button-submit')
        {!! Form::close() !!}
    </div>
@stop