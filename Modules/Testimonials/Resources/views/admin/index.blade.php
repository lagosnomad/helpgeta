@extends('core::admin.master')

@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">Testimonials</a>
    </li>
@stop
@section('title', $title)

@section('page-css')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
@stop

@section('page-js')

    <script type="text/javascript"
            src="{{asset('assets/admin/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript"
            src="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <script>
        $(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('admin.'.$module.'.datatable')}}',
                columns: {!! json_encode(config($module.'.columns')) !!},
                drawCallback:function(){
                    $(".delete-me").click(function () {
                        if(confirm($(this).attr('data-confirm'))){
                            $.ajax({
                                url: $(this).attr('href'),
                                type: 'DELETE',
                                success: function(data){
                                    document.location.href = '{{route('admin.'.$module.'.index')}}';
                                },
                                data: {_token: '{{csrf_token()}}'}
                            })
                        }
                        return false;
                    });

                    $('.tooltips').tooltip();

                }
            });
        });
    </script>
@stop

@section('page-group-title')
    {{trans($module . '::global.group_name')}}
    <small>@Lang($module . '::global.group_description')</small>
@stop


@section('main')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet light">
                @include('core::admin._porlet-title', ['module' => $module,'type'=>'create','caption'=>'index'])
                <div class="portlet-body">
                    {!!generate_datatable(config($module.'.th'))!!}
                </div>
            </div>
        </div>
    </div>

@stop
