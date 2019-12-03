<div class="form-widget">
    <aside>
        <p class="title">Personal Info</p>
        <p class="subtitle">
            Tell us a bit about yourself. This information will appear on your public profile, so that potential buyers can get to know you better
        </p>
    </aside>
    <div class="form-widget-content">
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">First Name</label>
                    <div class="control">
                        {!! Form::text('first_name',null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">Last Name</label>
                    <div class="control">
                        {!! Form::text('last_name',null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Email Address</label>
                    <div class="control">
                        {!! Form::text('email',null,['class'=>'input','disabled'=>'disabled']) !!}
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="field">
                    <label class="label">Username</label>
                    <div class="control">
                        {!! Form::text('username',null,['class'=>'input','disabled'=>'disabled']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column">
                <div class="field">
                    <label class="label">Phone Number</label>
                    <div class="control">
                        {!! Form::text('phone',null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>
        </div>
        @if($model->hasRoleName('Artisan'))
            {{--<div class="columns">
                <div class="column is-12">
                    <div class="field">
                        <label class="label">Business Name (Optional)</label>
                        <div class="control">
                            {!! Form::text('artisan[business_name]',null,['class'=>'input']) !!}
                        </div>
                        <p class="help is-primary">Leave blank if you don't have a registered business name</p>
                    </div>
                </div>
            </div>--}}
            <div class="columns">
                <div class="column is-12">
                    <div class="field">
                        <label class="label">Short Bio</label>
                        <div class="control">
                            {!! Form::textarea('artisan[bio]',null,['class'=>'textarea','rows'=>3]) !!}
                        </div>
                        <p class="help is-primary">Tell the service requester a little about yourself</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="columns">
            <div class="column is-12">
                <div class="field">
                    <label class="label">Address</label>
                    <div class="control">
                        {!! Form::textarea('address',null,['class'=>'textarea','rows'=>2]) !!}
                    </div>
                </div>
            </div>
            {{--<div class="column is-6">
                <div class="field">
                    <label class="label">Country</label>
                    <div class="control">
                        {!! Form::select('country',[],null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>--}}
        </div>
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">State</label>
                    <states-select-input :selected="{{is_null($model->state_id) ? 0 : $model->state_id}}"></states-select-input>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">LGA</label>
                    <cities-select-input :selected="{{is_null($model->city_id) ? 0 : $model->city_id}}"></cities-select-input>
                </div>
            </div>
        </div>
    </div>
</div>
