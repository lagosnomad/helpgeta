@section('page-breadcrumbs')
    <li>
        <a href="{{route('admin.users.roles.index')}}">Roles</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="javascript:;">@if(!isset($id)) New Role @else Edit Role @endif</a>
    </li>
@stop
{!! form_start($form,['class'=>'']) !!}
@include('core::admin._buttons-form',['top'=>true])
<div class="form-body">
    <div class="tabbable-custom">
        <ul class="nav nav-tabs ">
            <li class="active">
                <a href="#tab_1" data-toggle="tab">
                    Basic </a>
            </li>
            <li>
                <a href="#tab_3" data-toggle="tab">
                    Permissions </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="row">
                    <div class="col-md-12">
                        {!! form_row($form->name) !!}
                    </div>
                    <div class="col-md-12">
                        {!! form_row($form->slug) !!}
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_3">
                @if(!isset($id))
                    @include('users::admin._permissions_create')
                @else
                    @include('users::admin._permissions', ['model' => $model])
                @endif
            </div>

        </div>
    </div>
    {!! form_rest($form) !!}
</div>
@include('core::admin._buttons-form')
{!! form_end($form,false) !!}