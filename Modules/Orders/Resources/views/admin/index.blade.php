@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">Requests</a>
    </li>
@stop
{!!generate_datatable(config($module.'.th'))!!}