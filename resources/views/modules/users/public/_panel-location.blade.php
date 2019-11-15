<div class="panel">
    <div class="panel-heading">
        Location
    </div>
    <div class="panel-body">
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Address</label>
                    <div class="control">
                        {!! Form::textarea('address',null,['class'=>'input','rows'=>3]) !!}
                    </div>
                </div>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">Country</label>
                    <div class="control">
                        {!! Form::select('country',[],null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-6">
              <states></states>
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">LGA</label>
                    <div class="control">
                        {!! Form::select('lga',[],null,['class'=>'input']) !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>