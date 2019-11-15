@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">Users</a>
    </li>
@stop
{!!generate_datatable(config($module.'.th'))!!}