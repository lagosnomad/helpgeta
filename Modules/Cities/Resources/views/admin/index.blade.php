@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">Cities</a>
    </li>
@stop
{!!generate_datatable(config($module.'.th'))!!}