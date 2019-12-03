@extends('core::admin.master')

@section('page-breadcrumbs')
    <li>
        <a href="{{route('admin.artisans.index')}}">Service Providers</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="javascript:;">{{$model->user->present()->fullname}}</a>
    </li>
@stop

@section('page-toolbar')

@stop

@section('page-css')
    <link href="{{asset('assets/admin/pages/css/profile.css')}}" id="style_components" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css"
          href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <style>
        .profile-stat .col-md-6 {
            margin-bottom: 15px;
        }
    </style>

@stop

@section('page-js')

    <script type="text/javascript"
            src="{{asset('assets/admin/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <script>
        $(function () {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('admin.orders.datatable',$model->user->id)}}',
                columns: [
                    {"data": "order_number", "name": "order_number"},
                    {"data": "created_at", "name": "created_at"},
                    {"data": "total", "name": "total"},
                    {"data": "user_name", "name": "users.first_name"},
                    {"data": "status_name", "name": "order_status.name"},
                    {"data": "action", "name": "action"}
                ],
                drawCallback: function () {
                    $('.tooltips').tooltip();
                }
            });
        });
    </script>
@stop

@section('title',trans('artisans::global.group_name'))

@section('page-group-title')
    @Lang('artisans::global.group_name')
    <small>@Lang('artisans::global.group_description')</small>
@stop



@section('main')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet " style="padding-bottom:20px !important;">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic">
                        <img src="{{$model->user->present()->thumbSrc(150,150,[],'avatar')}}" class="img-responsive"
                             alt="" style="background:#fff;">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">{{$model->user->present()->fullname}}</div>
                        <div class="profile-usertitle-job"> {{$model->user->username}} </div>
                    </div>
                    <div class="profile-userbuttons">
                        <a href="{{route('admin.artisans.edit',$model->id)}}" class="btn btn-circle btn-primary btn-sm">Edit </a>
                    </div>
                    <!-- END MENU -->
                </div>

            @include('artisans::admin._stats')

            <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Account Information</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab" class="bold">Account</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab" class="bold">Services</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab" class="bold">Requests</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1_1">
                                        @include('artisans::admin._basic-info')
                                        @include('artisans::admin._bank-info')
                                        @include('artisans::admin._guarantor-info')
                                        @include('artisans::admin._id-info')
                                    </div>
                                    <div class="tab-pane" id="tab_1_3">
                                        @include('artisans::admin._services')
                                    </div>
                                    <div class="tab-pane" id="tab_1_2">
                                        {!!generate_datatable($request_th)!!}
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>


@stop