@extends('pages::public.master')

@section('page')

    @include('pages::public._section-banner')

    <categories-home-list :categories="{{Categories::latest(10,['items'])}}"></categories-home-list>

    <how-it-works-section></how-it-works-section>

    @include('pages::public._section-call-out')

    <testimonials-list :testimonials="{{Testimonials::latest(6)}}" ></testimonials-list>

@endsection

