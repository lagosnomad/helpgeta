@extends('core::public.account-master')

@section('title','My Account')


@section('css')

@stop

@section('js')

@stop

@section('page')
    <div class="main-heading account-heading">
        <h3 class="is-pulled-left">Manage <span>Requests</span></h3>
        <a href="{{route('categories')}}" class="button is-primary is-pulled-right is-hidden-mobile">Make a Request</a>
        <div class="is-clearfix"></div>
    </div>
    <div class="is-clearfix"></div>
    <orders-table-list></orders-table-list>

@stop