<div class="panel">
    <div class="panel-heading">
        Bank Information
    </div>
    <div class="panel-body">
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Bank Name</label>
                    <div class="control">
                        {!! Form::text('artisan[bank_name]',null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>

        </div>
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Account Name</label>
                    <div class="control">
                        {!! Form::text('artisan[account_name]',null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">Account Number</label>
                    <div class="control">
                        {!! Form::text('artisan[account_number]',null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>