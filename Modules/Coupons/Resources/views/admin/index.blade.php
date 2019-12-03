@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">Coupons</a>
    </li>
@stop
{!!generate_datatable(config($module.'.th'))!!}