@section('page-breadcrumbs')
    <li>
        <a href="{{route('admin.testimonials.index')}}">@Lang($module . '::global.name')</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="javascript:;">@if(!isset($id)) New @Lang($module . '::global.new') @else Edit @Lang($module . '::global.edit') @endif</a>
    </li>
@stop
{!! form_start($form,['id'=>'form-validate']) !!}
@include('core::admin._buttons-form',['top'=>true])
<div class="form-body">
    {!! form_rest($form) !!}
</div>
@include('core::admin._buttons-form')
{!! form_end($form,false) !!}