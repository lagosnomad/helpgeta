@extends('core::admin.master')

@section('title', $title)

@section('page-css')
    <style>
        .reports-stat .label{
            font-size: 1.5rem;
        }

        .reports-stat td{
            padding: 12px !important;
        }
    </style>
@stop

@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">Reports</a>
    </li>
@stop

@section('page-js')

@stop

@section('page-group-title')
    {{trans($module . '::global.group_name')}}
    <small>@Lang($module . '::global.group_description')</small>
@stop


@section('main')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font-color hide"></i>
                        <span class="caption-subject theme-font-color bold uppercase">
                            Report Stats ({{get_friendly_date($start_date)}} - {{get_friendly_date($end_date)}})
                        </span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-danger btn-circle btn-sm red-sunglo" data-toggle="modal" href="#report-period">
                            <i class="fa fa-refresh"></i> Change Period </a>
                        {{--<a href="#" class="btn btn-circle btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Advanced Options </a>--}}
                        @include('core::admin._button-fullscreen')
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="alert alert-info">
                        Below is the report summary between <strong>{{get_friendly_date($start_date)}}</strong> and <strong>{{get_friendly_date($end_date)}}</strong>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered reports-stat">
                                <tr>
                                    <td style="width: 30%;"><b>Total Requests</b></td>
                                    <td><span class="label label-primary">{{Orders::getCountForPeriod($start_date,$end_date)}}</span></td>
                                </tr>
                                <tr>
                                    <td><b>Total Completed Requests</b></td>
                                    <td><span class="label label-success">{{Orders::getCountForPeriod($start_date,$end_date,'completed')}}</span></td>
                                </tr>
                                <tr>
                                    <td><b>Total Amount Received</b></td>
                                    <td><span class="label label-info">{{format_currency(Orders::getTotalForPeriod($start_date,$end_date))}}</span></td>
                                </tr>
                                <tr>
                                    <td><b>Total Amount Paid to Service Providers</b></td>
                                    <td><span class="label label-warning">{{format_currency(0)}}</span></td>
                                </tr>
                                <tr>
                                    <td><b>Total Amount Made </b></td>
                                    <td><span class="label label-danger">{{format_currency(0)}}</span></td>
                                </tr>
                                <tr>
                                    <td><b>Total Number of Registered Service Providers</b></td>
                                    <td><span class="label label-primary">{{app(\Modules\Users\Repositories\UserInterface::class)->getCountForPeriod($start_date,$end_date,'artisan')}}</span></td>
                                </tr>
                                <tr>
                                    <td><b>Total Number of Registered Users</b></td>
                                    <td><span class="label label-warning">{{app(\Modules\Users\Repositories\UserInterface::class)->getCountForPeriod($start_date,$end_date,'user')}}</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('reports::admin._modal')
@stop