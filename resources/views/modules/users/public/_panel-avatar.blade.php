<div class="panel">
    <div class="panel-heading">
        Profile Picture
    </div>
    <div class="panel-body">
        <div class="level">
            <div class="level-left">
                <div class="level-item">
                    <figure class="image is-64x64">
                        <img src="{!! $model->present()->thumbSrc(64,64,[],'avatar') !!}" alt="Image" class="is-circled">
                    </figure>
                </div>
                <div class="level-item">
                    <div class="field">
                        <label class="label">Change Profile Picture</label>
                        <div class="file">
                            <label class="file-label">
                                <input class="file-input" type="file" name="avatar">
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
</div>