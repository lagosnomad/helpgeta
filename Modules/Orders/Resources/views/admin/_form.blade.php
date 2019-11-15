@section('page-breadcrumbs')
    <li>
        <a href="{{route('admin.orders.index')}}">Orders</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="javascript:;">@if(!isset($id)) New orders @else Edit orders @endif</a>
    </li>
@stop
{!! form_start($form,['id'=>'form-validate','class'=>'form form-horizontal form-label-left']) !!}
@include('core::admin._buttons-form',['top'=>true])
<div class="form-body">
    {!! form_rest($form) !!}
</div>
@include('core::admin._buttons-form')
{!! form_end($form,false) !!}