@extends('core::public.master')

@section('title', $model->category . $websiteTitle)
@section('description', $model->meta_description)
@section('ogTitle', $model->category . $websiteTitle)
@section('ogDescription', $model->meta_description)

@section('main')

    <main id="page-main" class="artisan-single-wrapper">
        <div class="page-side-bg"></div>
        <div class="container">
            <div class="page-main-container">
                <div class="page-lead">

                    <div class="page-heading for-artisan">
                        <div class="media">
                            <div class="media-left">
                                <figure class="image is-64x64">
                                    <img src="{!! $model->user->present()->thumbSrc(64,64,[],'avatar') !!}" alt="Image"
                                         class="is-circled">
                                </figure>
                            </div>
                            <div class="media-content">
                                <div class="content">
                                    <h2 class="title is-3">
                                        {!! $model->present()->businessName !!}
                                    </h2>
                                    <div class="rating-wrapper">
                                        <div class="ratings is-size-5">
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span class="is-size-6 is-uppercase">0 Reviews</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="media-right">
                                @if($category_id)
                                    <request-button :artisan-id="{{$model->id}}" :category-id="{{$category_id}}"
                                                    size="is-medium"></request-button>
                                @else
                                    <artisans-categories-button
                                            size="is-medium"
                                            :artisan-id="{{$model->id}}"
                                            :categories="{{$model->categories->toJson()}}">
                                        Request Service
                                    </artisans-categories-button>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="content">

                        <div class="columns">
                            <div class="column is-4">
                                <div class="box artisan-detail-box bg-grey">
                                    <div class="artisan-detail-box-item">
                                        <h4 class="title">
                                            <span class="icon"><i class="fa fa-suitcase"></i></span>
                                            <span>Services Rendered</span>
                                        </h4>
                                        <div class="content">
                                            {!! $model->present()->categoriesList !!}
                                        </div>
                                    </div>
                                    <div class="artisan-detail-box-item">
                                        <h4 class="title">
                                            <span class="icon"><i class="fa fa-map-marker"></i></span>
                                            <span>Location</span>
                                        </h4>
                                        <div class="content">
                                            Surulere, Lagos
                                        </div>
                                    </div>
                                    <div class="artisan-detail-box-item">
                                        <h4 class="title">
                                            <span class="icon"><i class="fa fa-calendar"></i></span>
                                            <span>Available Days</span>
                                        </h4>
                                        <div class="content">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <h3 class="title is-4">Ratings & Reviews</h3>
                                <hr>
                                <div id="rating-main-wrapper">
                                    <div class="rating-wrapper">
                                        <div class="ratings is-size-5">
                                            <span class="average-rating">0.0</span>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span class="is-size-6 is-uppercase">0 Reviews</span>
                                        </div>
                                    </div>
                                    <div class="rating-star-progress">
                                        <div class="star-progress">
                                            <span>5 Star</span>
                                            <progress class="progress is-small" value="0" max="100">0</progress>
                                        </div>
                                        <div class="star-progress">
                                            <span>4 Star</span>
                                            <progress class="progress is-small" value="0" max="100">0</progress>
                                        </div>
                                        <div class="star-progress">
                                            <span>3 Star</span>
                                            <progress class="progress is-small" value="0" max="100">0</progress>
                                        </div>
                                        <div class="star-progress">
                                            <span>2 Star</span>
                                            <progress class="progress is-small" value="0" max="100">0</progress>
                                        </div>
                                        <div class="star-progress">
                                            <span>1 Star</span>
                                            <progress class="progress is-small" value="0" max="100">0</progress>
                                        </div>
                                    </div>
                                    <p class="is-size-5">
                                        No review for this service provider yet
                                    </p>
                                    <a href="#" class="button is-primary is-outlined">Make a request to rate service
                                        provider</a>
                                </div>
                            </div>
                        </div>
                    </div>


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