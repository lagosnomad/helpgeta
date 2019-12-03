@section('page-breadcrumbs')
    <li>
        <a href="{{route('admin.artisans.index')}}">@Lang($module . '::global.name')</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="javascript:;">@if(!isset($id)) @Lang($module . '::global.new') @else @Lang($module . '::global.edit') @endif</a>
    </li>
@stop
{!! form_start($form,['class'=>'']) !!}
@include('core::admin._buttons-form',['top'=>true])
<div class="form-body">
    {{--<div class="row">
        <div class="col-md-12">
            <h4>Account Information</h4>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">{!! form_row($user_form->first_name) !!}</div>
        <div class="col-md-6">{!! form_row($user_form->last_name) !!}</div>
        <div class="col-md-12">
            {!! form_row($user_form->email) !!}
        </div>
        <div class="col-md-6">
            {!! form_row($user_form->password) !!}
        </div>
        <div class="col-md-6">
            {!! form_row($user_form->confirm_password) !!}
        </div>
    </div>--}}
    {{--<div class="row">
        <div class="col-md-12">
            <h4>Basic Information</h4>
            <hr>
        </div>
    </div>--}}
    <div class="row">
        <div class="col-md-12">
            {!! form_row($form->is_activated) !!}
        </div>
        <div class="col-md-12">
            {!! form_row($form->is_verified) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! form_row($form->bank_name) !!}
        </div>
        <div class="col-md-6">
            {!! form_row($form->account_name) !!}
        </div>
        <div class="col-md-6">
            {!! form_row($form->account_number) !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! form_row($form->guarantor_full_name) !!}
        </div>
        <div class="col-md-6">
            {!! form_row($form->guarantor_phone) !!}
        </div>
        <div class="col-md-6">
            {!! form_row($form->guarantor_email) !!}
        </div>

    </div>
</div>
@include('core::admin._buttons-form')
{!! form_end($form,false) !!}