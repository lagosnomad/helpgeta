@extends('core::admin.master')

@section('title', trans($module . '::global.new'))

@section('page-css')

@stop

@section('page-js')

@stop

@section('page-group-title')
    @Lang($module . '::global.group_name')
        <small>@Lang($module . '::global.group_description')</small>
@stop


@section('main')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet light">
                @include('core::admin._porlet-title', ['module' => $module,'type'=>'back','caption'=>'new'])
                <div class="portlet-body form">
                    @include($module . '::admin._form')
                </div>
            </div>
        </div>
    </div>

@stop