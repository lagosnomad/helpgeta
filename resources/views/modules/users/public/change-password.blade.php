@extends('core::public.account-master')

@section('title','My Account')


@section('css')

@stop

@section('js')

@stop

@section('page')
    <div class="main-heading account-heading">
        <h3>Change <span>Password</span></h3>
    </div>

    <div class="columns ">
        <div class="column is-6">

            {!! Form::open(['route'=>'profile.change-password.post']) !!}
            <div class="field">
                <label class="label">New Password</label>
                <div class="control">
                    {!! Form::password('password',['class'=>'input']) !!}
                </div>
            </div>
            <div class="field">
                <label class="label">Confirm Password</label>
                <div class="control">
                    {!! Form::password('confirm_password',['class'=>'input']) !!}
                </div>
            </div>
            <div class="field is-grouped is-grouped-centered">
                <div class="control">
                    <button class="button is-primary is-medium" type="submit">Save</button>
                </div>
                <div class="control">
                    <button class="button is-medium">Cancel</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop