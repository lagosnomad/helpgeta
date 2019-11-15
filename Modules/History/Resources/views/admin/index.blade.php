@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">History</a>
    </li>
@stop
{!!generate_datatable(config($module.'.th'))!!}