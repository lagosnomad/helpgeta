@extends('core::admin.master')

@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">Orders</a>
    </li>
@stop

@section('page-toolbar')

@stop

@section('page-css')
    {{--
        @include('orders::_status-colors')
    --}}
@stop

@section('title',trans('orders::global.group_name'))

@section('page-group-title')
    @Lang('orders::global.group_name')
    <small>@Lang('orders::global.group_description')</small>
@stop



@section('main')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase"> Request #{{$model->order_number}}
                            | {!! order_status_label($model->status->name,$model->status->color_class) !!}
                                        </span>
                    </div>
                    <div class="actions">
                        <a href="javascript:history.back()" class="btn btn-circle btn-default btn-sm">
                            <i class="fa fa-arrow-left"></i> back </a>
                    </div>

                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="portlet solid grey">
                                <div class="portlet-title">
                                    <div class="caption">
                                        Request Summary
                                    </div>
                                    {{--<div class="actions">
                                        <a href="javascript:;" class="btn btn-default btn-sm">
                                            <i class="fa fa-pencil"></i> Edit </a>
                                    </div>--}}
                                </div>
                                <div class="portlet-body">
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Date Requested:</div>
                                        <div class="col-md-7 value">  {{$model->created_at}} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Total:</div>
                                        <div class="col-md-7 value"> {{$model->total}} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name">Total Hours:</div>
                                        <div class="col-md-7 value">{{$model->total_hours}} </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Total Days</div>
                                        <div class="col-md-7 value">{{$model->total_days}}</div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Service Requested:</div>
                                        <div class="col-md-7 value">  {{$model->item->category}}
                                            - {{$model->item->amount}}</div>
                                    </div>

                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Service Date(s):</div>
                                        <div class="col-md-7 value">
                                            <ul>
                                                @foreach($model->item->dates as $date)
                                                    <li>{{$date->date}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Service Address</div>
                                        <div class="col-md-7 value">
                                            {{$model->address}} {{($model->landmark !='') ? ','.$model->landmark : ''}}
                                            <br>
                                            {{$model->city->name}}, {{$model->state->name}}
                                        </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Service Contact</div>
                                        <div class="col-md-7 value">
                                            {{$model->phone}}
                                        </div>
                                    </div>
                                    <div class="row static-info">
                                        <div class="col-md-5 name"> Notes</div>
                                        <div class="col-md-7">{{$model->notes}} </div>
                                    </div>
                                    @if(isset($model->payment))
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Payment Method</div>
                                            <div class="col-md-7">{{$model->payment->payment_method}} </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Payment Status</div>
                                            <div class="col-md-7">{{$model->payment->status}} </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Transaction Ref</div>
                                            <div class="col-md-7">{{$model->payment->reference}} </div>
                                        </div>
                                        <div class="row static-info">
                                            <div class="col-md-5 name"> Transaction Fee</div>
                                            <div class="col-md-7">{{format_currency($model->payment->transaction_fee)}} </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Service Provider</div>
                                        <div class="panel-body" style="padding:0">
                                            <table class="table table-striped">
                                                <tr>
                                                    <td><b>Full Name</b></td>
                                                    <td>{{$model->artisanUser->present()->fullname}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Username</b></td>
                                                    <td>{{$model->artisanUser->username}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Email Address</b></td>
                                                    <td>{{$model->artisanUser->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Phone Number</b></td>
                                                    <td>{{$model->artisanUser->phone}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Service Requester</div>
                                        <div class="panel-body" style="padding:0">
                                            <table class="table table-striped">
                                                <tr>
                                                    <td><b>Full Name</b></td>
                                                    <td>{{$model->user->present()->fullname}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Username</b></td>
                                                    <td>{{$model->user->username}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Email Address</b></td>
                                                    <td>{{$model->user->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Phone Number</b></td>
                                                    <td>{{$model->user->phone}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



@stop