<div class="form-widget">
    <aside>
        <p class="title">Means of Identification</p>
        <p class="subtitle">
            add a means of identification i.e. national id card, passport e.t.c.
        </p>
    </aside>
    <div class="form-widget-content">
        <div class="columns">
            <div class="column is-6">
                <div class="field">
                    <label class="label">Identification Type</label>
                    <div class="control">
                        {!! Form::select('artisan[identification_id]',
                        Identifications::select('all',true),
                        null,['class'=>'input']) !!}
                    </div>
                </div>
                @if(isset($model->artisan->identification_file))
                    <div class="field">
                        <p class="control">
                            <a href="{{asset('uploads/identifications/'.$model->artisan->identification_file)}}"
                               class="button is-primary is-small" target="_blank">
                                <span class="icon"><i class="fa fa-download"></i></span>
                                <span>View uploaded document</span>
                            </a>
                        </p>
                    </div>
                @endif
            </div>
            <div class="column is-6">
                <div class="field">
                    <label class="label">Upload Document</label>
                    <div class="file">
                        <label class="file-label">
                            <input class="file-input" type="file" name="artisan[identification_file]">
                            <span class="file-cta">
                              <span class="file-icon">
                                <i class="fa fa-upload"></i>
                              </span>
                              <span class="file-label">
                                Choose a file…
                              </span>
                            </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>