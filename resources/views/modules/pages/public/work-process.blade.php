@extends('pages::public.master')
@section('page')

    <main id="page-main">
        <div class="page-side-bg"></div>
        <div class="container">
            <div class="page-main-container">
                <div class="page-lead">

                    @include('pages::public._page-banner-section')

                    <b-tabs class="block">
                        <b-tab-item label="For Service Providers">
                            <div class="has-margin-t-5">
                                @include('pages::public._work-process-artisan')
                            </div>
                        </b-tab-item>
                        <b-tab-item label="Finding A Service Provider">

                        </b-tab-item>
                    </b-tabs>

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