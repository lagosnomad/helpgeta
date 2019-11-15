@extends('core::admin.master')

@section('title', trans($module . '::global.roles.edit'))

@section('page-css')

@stop

@section('page-js')

@stop

@section('page-group-title')
    @Lang($module . '::global.roles.group_name')
    <small>@Lang($module . '::global.roles.group_description')</small>
@stop


@section('main')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart theme-font-color hide"></i>
                        <span class="caption-subject theme-font-color bold uppercase">
                            @Lang($module . '::global.roles.edit')
                        </span>
                    </div>
                    <div class="actions">
                        @include('core::admin._button-back', ['module' => $module])
                        @include('core::admin._button-fullscreen')
                    </div>
                </div>
                <div class="portlet-body form">
                    @include($module . '::admin.roles._form')
                </div>
            </div>
        </div>
    </div>

@stop