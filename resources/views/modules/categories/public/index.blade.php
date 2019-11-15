@extends('core::public.master')

@section('title', 'Services' . $websiteTitle)
@section('description', 'description')
@section('ogTitle', 'Services' . $websiteTitle)
@section('ogDescription', 'description')

@section('main')

    <main id="page-main">
        <div class="page-side-bg"></div>
        <div class="container">
            <div class="page-main-container">
                <div class="page-lead">
                    <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
                        <ul>
                            <li><a href="{!! url('/') !!}">Home</a></li>
                            <li class="is-active"><a href="#" aria-current="page">Browse Services</a></li>
                        </ul>
                    </nav>
                    <div class="page-heading">
                        <h2 class="title is-3 is-spaced">Available <span>Services</span></h2>
                        <p class="subtitle is-6">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem voluptatem obcaecati!
                        </p>
                    </div>

                    <categories-list :categories="{{$models}}"></categories-list>

                </div>
                <div class="page-side">
                    @include('pages::public._widget-contact')
                    @include('pages::public._widget-newsletter')
                </div>
            </div>
        </div>
    </main>

@stop