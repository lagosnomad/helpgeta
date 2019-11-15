@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">Menus</a>
    </li>
@stop
{!!generate_datatable(config($module.'.th'))!!}