@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">Service Providers</a>
    </li>
@stop
{!!generate_datatable(config($module.'.th'))!!}