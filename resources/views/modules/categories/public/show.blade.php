@extends('core::public.master')

@section('title', $model->category . $websiteTitle)
@section('description', $model->meta_description)
@section('ogTitle', $model->category . $websiteTitle)
@section('ogDescription', $model->meta_description)

@section('main')

    <main id="page-main" class="categories-single">
        <div class="page-side-bg"></div>
        <div class="container">
            <div class="page-main-container">
                <div class="page-lead">
                    <nav class="breadcrumb has-bullet-separator" aria-label="breadcrumbs">
                        <ul>
                            <li><a href="{!! url('/') !!}">Home</a></li>
                            <li><a href="{{route('categories')}}">Browse Services</a></li>
                            <li class="is-active"><a href="#" aria-current="page">{!! $model->category !!}</a></li>
                        </ul>
                    </nav>
                    <div class="page-heading">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image">
                                    <img src="{!! $model->present()->thumbSrc(64,64,[],'icon') !!}" alt="" class="">
                                </figure>
                            </div>
                            <div class="media-content vertical-middle">
                                <h2 class="title is-3 {!! ($model->body != '') ?: 'is-marginless' !!}">{!! $model->category !!}</h2>
                                @if($model->body != '')
                                    <p class="subtitle is-6">
                                        {!! $model->body !!}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <artisans-list :category-id="{{$model->id}}"></artisans-list>

                    {{--@include('artisans::public._list',['category_slug'=>$model->slug])--}}
                </div>
                <div class="page-side">
                    @include('pages::public._widget-categories')
                    @include('pages::public._widget-contact')
                    @include('pages::public._widget-newsletter')
                </div>
            </div>
        </div>
    </main>

@stop