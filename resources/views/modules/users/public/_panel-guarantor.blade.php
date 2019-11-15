<div class="panel">
    <div class="panel-heading">
        Guarantor Information
    </div>
    <div class="panel-body">
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Full Name</label>
                    <div class="control">
                        {!! Form::text('artisan[guarantor_full_name]',null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">Phone Number</label>
                    <div class="control">
                        {!! Form::text('artisan[guarantor_phone]',null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Email Address</label>
                    <div class="control">
                        {!! Form::text('artisan[guarantor_email]',null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>