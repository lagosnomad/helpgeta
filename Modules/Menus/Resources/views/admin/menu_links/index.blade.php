@extends('core::admin.master')

@section('title', $title)

@section('page-css')
    <style>
        .sortable-page li.mjs-nestedSortable-collapsed > ol {
            display: none;
        }
        .portlet.parent {
            box-shadow: none;
        }
        .sortable-page .caret-h{
            color:#333;
            font-size: 20px;
        }

    </style>
@stop

@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">Menus</a>
    </li>
@stop

@section('page-js')
    <script type="text/javascript"
            src="{{asset('assets/admin/jquery.mjs.new.nestedSortable.js')}}"></script>
    <script>
        $(function(){
            $.get('{{route('ajax.menus.menu_links.index',$menu->id)}}', {}, function(data){
                $('#orderResult').html(data);
            });

            $('#save').on('click',(function(){
                oSortable = $('.sortable-page').nestedSortable('toArray');
                $('#orderResult').slideUp(function(){
                    $.post('{{route('ajax.menus.menu_links.sort',$menu->id)}}', { sortable: oSortable }, function(data){
                        $('#orderResult').html(data);
                        $('#orderResult').slideDown();
                    });
                });
                return false;
            }));

        });
    </script>
@stop

@section('page-group-title')
    {{trans('Menus')}}
    <small>{{trans('use this section to manage menu location')}}</small>
@stop

@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">Menus</a>
    </li>
@stop

@section('main')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet parent">
                <div class="portlet-title">
                    <div class="caption">
                        <span class="caption-subject theme-font-color bold">
                            {{$menu->name}} Menu
                        </span>
                    </div>
                    <div class="actions">
                        {{--<a href="{{route('admin.menus.edit',[$menu->id])}}"
                           class="btn btn-circle red-sunglo btn-sm">
                            <i class="fa fa-plus"></i> Edit </a>--}}
                        <a href="{{route('admin.menus.index')}}" class="btn btn-circle btn-default btn-sm">
                            <i class="fa fa-arrow-left"></i> back </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <span class="caption-subject theme-font-color bold">
                                            Links
                                        </span>
                                    </div>
                                    <div class="actions">
                                        <a href="#"
                                           class="btn btn-circle btn-success btn-sm" id="save">
                                            <i class="fa fa-plus"></i> Sort </a>
                                        @include('core::admin._button-fullscreen')
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="alert alert-info">
                                        Drag to order links and then click <strong>'Sort'</strong> Button above
                                    </div>
                                    <div id="orderResult"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="portlet light">
                                <div class="portlet-title">
                                    <div class="caption caption-md">
                                        <span class="caption-subject theme-font-color bold">
                                            Add New link
                                        </span>
                                    </div>
                                    <div class="actions">
                                        @include('core::admin._button-fullscreen')
                                    </div>
                                </div>
                                <div class="portlet-body" style="padding-bottom:20px;">
                                    @include('menus::admin.menu_links._form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop