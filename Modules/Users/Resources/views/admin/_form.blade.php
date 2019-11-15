@section('page-breadcrumbs')
    <li>
        <a href="{{route('admin.users.index')}}">Users</a>
        <i class="fa fa-angle-right"></i>
    </li>
    <li>
        <a href="javascript:;">@if(!isset($id)) New User @else Edit User @endif</a>
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
                <a href="#tab_2" data-toggle="tab">
                    Roles </a>
            </li>
            <li>
                <a href="#tab_3" data-toggle="tab">
                    Permissions </a>
            </li>
            @if(isset($id))
                <li>
                    <a href="#tab_4" data-toggle="tab">
                        New Password </a>
                </li>
            @endif
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="row">
                    <div class="col-md-6">
                        {!! form_row($form->first_name) !!}
                    </div>
                    <div class="col-md-6">
                        {!! form_row($form->last_name) !!}
                    </div>
                    <div class="col-md-12">
                        {!! form_row($form->email) !!}
                    </div>
                </div>
                @if(isset($id))
                <div class="row">
                    <div class="col-md-3">
                        <div class="checkbox{{ $errors->has('activated') ? ' has-error' : '' }}">
                            <input type="hidden" value="{{ $model->id === $currentUser->id ? '1' : '0' }}" name="activated"/>
                            <?php $oldValue = (bool) $model->isActivated() ? 'checked' : ''; ?>
                            <label for="activated">
                                <input id="activated"
                                       name="activated"
                                       type="checkbox"
                                       class="flat-blue"
                                       {{ $model->id === $currentUser->id ? 'disabled' : '' }}
                                       {{ Request::old('activated', $oldValue) }}
                                       value="1" />
                                {{ trans('users::global.activated') }}
                                {!! $errors->first('activated', '<span class="help-block">:message</span>') !!}
                            </label>
                        </div>
                    </div>
                </div>
                @endif
                @if(!isset($id))
                    <div class="row">
                        <div class="col-md-6">
                            {!! form_row($form->password) !!}
                        </div>
                        <div class="col-md-6">
                            {!! form_row($form->confirm_password) !!}
                        </div>
                    </div>
                @endif

            </div>
            <div class="tab-pane" id="tab_2">
                <div class="form-group">
                    <label>Select one or more roles</label>
                    @if(!isset($id))
                        <select multiple="" class="form-control" name="roles[]">
                            <?php foreach ($roles as $role): ?>
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            <?php endforeach; ?>
                        </select>
                    @else
                        <select multiple="" class="form-control" name="roles[]">
                            <?php foreach ($roles as $role): ?>
                            <option value="{{ $role->id }}" <?php echo $model->hasRoleId($role->id) ? 'selected' : '' ?>>{{ $role->name }}</option>
                            <?php endforeach; ?>
                        </select>
                    @endif
                </div>
            </div>
            <div class="tab-pane" id="tab_3">
                @if(!isset($id))
                    @include('users::admin._permissions_create')
                @else
                    @include('users::admin._permissions', ['model' => $model])
                @endif
            </div>
            @if(isset($id))
                <div class="tab-pane" id="tab_4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <label for="password" class="control-label">Password</label>
                                <input class="form-control required" value="" name="password" type="password"
                                       id="password">

                            </div>
                        </div>
                        <div class="col-md-6">
                            {!! form_row($form->confirm_password) !!}
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
@include('core::admin._buttons-form')
{!! form_end($form,false) !!}