@extends('core::admin.master')

@section('page-css')

@stop

@section('page-js')

@stop

@section('page-group-title')
    Dashboard
    <small></small>
@stop

@section('main')
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="fa fa-folder"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup">{{Orders::countAll()}}</span>
                    </div>
                    <div class="desc"> Requests </div>
                </div>
                <a class="more" href="#"> View
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat red">
                <div class="visual">
                    <i class="fa fa-cog"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup">{{Categories::countAll()}}</span>
                    </div>
                    <div class="desc"> Categories </div>
                </div>
                <a class="more" href="{{route('admin.categories.index')}}"> View
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-suitcase"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup">{{Artisans::countAll()}}</span>
                    </div>
                    <div class="desc"> Artisans </div>
                </div>
                <a class="more" href="{{route('admin.artisans.index')}}"> View
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="0">{{app(\Modules\Users\Repositories\UserInterface::class)->countAll()}}</span></div>
                    <div class="desc"> Users </div>
                </div>
                <a class="more" href="{{route('admin.users.index')}}"> View
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            @include('orders::admin._list-dashboard')
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <span class="caption-subject theme-font-color bold">
                            Recent Service Providers
                        </span>
                    </div>
                    <div class="actions">
                        <a href="#" class="btn btn-circle red-sunglo btn-sm">
                            <i class="fa fa-plus"></i> View All </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="alert alert-info">
                        List of service providers
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
