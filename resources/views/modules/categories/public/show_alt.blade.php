@extends('core::public.master')

@section('title', $model->category . $websiteTitle)
@section('description', $model->meta_description)
@section('ogTitle', $model->category . $websiteTitle)
@section('ogDescription', $model->meta_description)

@section('main')

    <section class="section bg-grey" id="page-title">
        <div class="container">
            <div class="page-caption">
                <div class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <h2 class="title is-3 has-no-space">{!! $model->category !!}</h2>
                           {{-- <nav class="breadcrumb has-arrow-separator" aria-label="breadcrumbs">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="{{route('categories')}}">Services Offered</a></li>
                                    <li class="is-active"><a href="#" aria-current="page">{!! $model->category !!}</a></li>
                                </ul>
                            </nav>--}}
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item">
                            <a href="{{route('categories')}}" class="button is-primary is-medium is-outlined">Browse Other Services</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section" id="page-content">
        <div class="container">
            <div class="columns">
                <div class="column is-4">
                    <div id="sidebar">
                        @include('categories::public._widget-search')
                        @include('categories::public._widget-filter-location')
                    </div>
                </div>
                <div class="column">
                    <div class="content has-text-centered">
                        <div class="level">
                            <div class="level-left">
                                <div class="level-item">
                                    <h3 class="title is-5"> <span class="has-text-primary">20</span> Service Providers Available</h3>
                                </div>
                            </div>
                            <div class="level-right">
                                <div class="level-item">
                                    <div class="field is-horizontal">
                                        <div class="field-label is-normal">
                                            <label class="">Sort</label>
                                        </div>
                                        <div class="field-body">
                                            <div class="field is-narrow">
                                                <div class="control">
                                                    <div class="select is-fullwidth">
                                                        <select>
                                                            <option>Ratings - Highest First</option>
                                                            <option>Ratings -  Lowest First</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('artisans::public._list')
                </div>
            </div>
        </div>
    </section>

@stop