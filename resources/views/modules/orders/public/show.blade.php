@extends('core::public.account-master')

@section('title','My Account')


@section('css')

@stop

@section('js')

@stop

@section('page')
    <orders-item-single :order="{{$model}}" :current-user="{{$user}}"></orders-item-single>
@stop