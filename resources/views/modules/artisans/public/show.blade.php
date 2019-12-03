@extends('core::public.master')

@section('title', $model->slug . $websiteTitle)
@section('description', $model->meta_description)
@section('ogTitle', $model->slug . $websiteTitle)
@section('ogDescription', $model->meta_description)

@section('main')

    <section class="section artisan-single-wrapper">
        <div class="container">
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
                            <div class="level">
                                <div class="level-left">
                                    <div class="level-item"><span class="has-text-weight-semibold">Username : </span> {{$model->slug}}</div>
                                    <div class="level-item"><span class="has-text-weight-semibold">Member since : </span> {{$model->user->present()->createdAt}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="media-right">
                            <request-button artisan-id="{{$model->slug}}" category-id="{{request()->get('ref_category',0)}}"
                                            size="is-medium"></request-button>

                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-4 has-border-right">
                    <div class="artisan-detail-box">
                        <div class="artisan-detail-box-item">
                            <h4 class="title">
                                <span class="icon"><i class="fa fa-star"></i></span>
                                <span>Ratings/Reviews</span>
                            </h4>
                            <div class="content">
                                <div class="ratings is-size-6 has-margin-b-7">
                                    <span class="average-rating">0.0</span>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span class="is-size-6 is-uppercase">0 Reviews</span>
                                </div>
                            </div>
                        </div>
                        <div class="artisan-detail-box-item">
                            <h4 class="title">
                                <span class="icon"><i class="fa fa-map-marker"></i></span>
                                <span>Location</span>
                            </h4>
                            <div class="content">
                                {{$model->present()->location}}
                            </div>
                        </div>

                        <div class="artisan-detail-box-item">
                            <h4 class="title">
                                <span class="icon"><i class="fa fa-user"></i></span>
                                <span>Bio</span>
                            </h4>
                            <div class="content">
                                {{$model->bio}}
                            </div>
                        </div>

                        <div class="artisan-detail-box-item">
                            <h4 class="title">
                                <span class="icon"><i class="fa fa-vcard"></i></span>
                                <span>Means of Identification</span>
                            </h4>
                            <div class="content">
                                {{$model->identification->title or ''}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="has-padding-bl-5 has-margin-b-5 has-border-bottom has-no-padding-l-mobile">
                        <h3 class="title is-4 has-text-weight-normal">Services & Pricing</h3>
                    </div>
                    <div class="content has-border-bottom has-padding-bl-5 has-no-padding-l-mobile">
                        <artisans-categories :categories="{{$model->categories}}"></artisans-categories>
                    </div>
                    <div class="has-padding-bl-5 has-margin-b-5 has-border-bottom has-no-padding-l-mobile">
                        <h3 class="title is-4 has-text-weight-normal">Reviews</h3>
                    </div>
                    <div class="content has-padding-bl-5 has-no-padding-l-mobile">
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
                            <p>
                                No review for this service provider yet, Make a request to rate service
                                provider
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@stop