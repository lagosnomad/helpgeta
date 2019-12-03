@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">$STUDLY_NAME$</a>
    </li>
@stop
{!!generate_datatable(config($module.'.th'))!!}