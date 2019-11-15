<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
    @include('core::admin._head')
</head>
<body class="page-md @section('body-class') page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid @show">
@section('main-body')
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">{{ config('myapp.app_name') }}</a>
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        @include('core::admin._page-actions')
        <div class="page-top">
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    @include('core::admin._user')
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="clearfix">
</div>
<div class="page-container">

    @include('core::admin._sidebar')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <div class="page-content">
            <h3 class="page-title">
                @yield('page-group-title')
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="icon-home"></i>
                        <a href="javascript:;">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>
                    @yield('page-breadcrumbs')
                </ul>
            </div>
            @yield('main')
        </div>
    </div>
</div>
@show
@include('core::admin._footer')
@yield('page-js')
</body>
</html>