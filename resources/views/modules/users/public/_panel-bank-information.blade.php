<div class="form-widget">
    <aside>
        <p class="title">Bank Account</p>
        <p class="subtitle">
            Please provide your account details as payments will be made 24hrs after the job has been completed
        </p>
    </aside>
    <div class="form-widget-content">
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Bank Name</label>
                    <div class="control">
                        {!! Form::text('artisan[bank_name]',null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">Account Name</label>
                    <div class="control">
                        {!! Form::text('artisan[account_name]',null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
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