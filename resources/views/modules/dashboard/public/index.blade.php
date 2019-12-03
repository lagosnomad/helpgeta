@extends('core::public.account-master')

@section('title','My Account')


@section('css')

@stop

@section('js')

@stop

@section('page')

    <div class="main-heading account-heading">
        <h3>Dashboard</h3>
    </div>

    <div class="has-padding-l-6 has-no-padding-l-mobile">
        <p style="margin-bottom:2rem">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
        </p>

        <div class="is-divider" data-content="QUICK LINKS"></div>

        <div class="columns">
            <div class="column">
                <a href="{{route('profile.index')}}" class="button is-account-action is-medium w-100 badge is-badge-left" data-badge="10% Completed">
                    <span class="icon is-medium"><i class="fa fa-edit"></i></span>
                    <span>Edit Profile</span>
                </a>
            </div>
            <div class="column">
                <a href="{!! route('categories') !!}" class="button is-account-action is-medium w-100 is-primary">
                    <span class="icon is-medium"><i class="fa fa-edit"></i></span>
                    <span>Make a Request</span>
                </a>
            </div>
            <div class="column">
                <a href="#" class="button is-account-action is-medium w-100 badge" data-badge="0">
                    <span class="icon is-medium"><i class="fa fa-edit"></i></span>
                    <span>View Requests</span>
                </a>
            </div>
        </div>
    </div>
@stop