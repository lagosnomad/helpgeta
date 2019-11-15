<div class="panel">
    <div class="panel-heading">
        Basic Information
    </div>
    <div class="panel-body">
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
                    <label class="label">Phone Number</label>
                    <div class="control">
                        {!! Form::text('phone',null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>
        </div>
        @if($model->hasRoleName('Artisan'))
            <div class="columns">
                <div class="column is-6">
                    <div class="field">
                        <label class="label">Business Name (Optional)</label>
                        <div class="control">
                            {!! Form::text('artisan[business_name]',null,['class'=>'input']) !!}
                        </div>
                        <p class="help is-primary">Leave blank if you don't have a registered business name</p>
                    </div>
                </div>
                <div class="column is-6">
                    <div class="field">
                        <label class="label">Short Bio</label>
                        <div class="control">
                            {!! Form::textarea('artisan[bio]',null,['class'=>'input','rows'=>5]) !!}
                        </div>
                        <p class="help is-primary">Tell the service requester a little about yourself</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>