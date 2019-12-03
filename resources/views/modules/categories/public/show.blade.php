@extends('core::public.master')

@section('title', $base_category->category . $websiteTitle)
@section('description', $base_category->meta_description)
@section('ogTitle', $base_category->category . $websiteTitle)
@section('ogDescription', $base_category->meta_description)

@section('main')
    <section class="section categories-single">
        <div class="container">
            <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
                <ul>
                    <li><a href="{!! url('/') !!}">Home</a></li>
                    <li><a href="{{route('categories')}}">Browse Services</a></li>
                    <li class="is-active"><a href="#" aria-current="page">{!! $base_category->category !!}</a></li>
                </ul>
            </nav>
            <div class="page-heading">
                <div class="media">
                    <div class="media-left">
                        <figure class="image">
                            <img src="{!! $base_category->present()->thumbSrc(64,64,[],'icon') !!}" alt="" class="">
                        </figure>
                    </div>
                    <div class="media-content vertical-middle">
                        <h1 class="title is-3 {!! ($base_category->body != '') ?: 'is-marginless' !!}">{!! $base_category->category !!}</h1>
                        @if($base_category->body != '')
                            <p class="subtitle is-6">
                                {!! $base_category->body !!}
                            </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="columns">
                <div class="column is-3 has-border-right">
                    <b-collapse :open="false" class="is-hidden-tablet">
                        <button class="button is-outlined is-primary has-text-weight-semibold is-fullwidth" slot="trigger">
                            <span class="icon has-margin-r-6"><i class="fa fa-filter"></i></span> FiLTER RESULTS
                        </button>
                        <div class="has-padding-bt-4 has-border-bottom">
                            <categories-sidebar></categories-sidebar>
                        </div>
                    </b-collapse>
                    <div class="is-hidden-mobile">
                        <categories-sidebar></categories-sidebar>
                    </div>
                </div>
                <div class="column is-9">
                    <artisans-list
                            :search-base-category="{{$base_category}}"
                            :search-category="{{$search_category}}"
                            :search-filters="{{$search_filters}}">
                    </artisans-list>
                </div>
            </div>

        </div>
    </section>

@stop