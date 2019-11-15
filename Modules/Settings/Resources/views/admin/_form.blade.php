@section('page-breadcrumbs')
    <li>
        <a href="{{route('admin.settings.index')}}">Settings</a>
    </li>
@stop
{!! form_start($form,['class'=>'']) !!}
<div class="form-actions top">
    <button type="submit" class="btn blue">Save</button>
</div>
<div class="form-body">
    <div class="tabbable-custom">
        <ul class="nav nav-tabs ">
            <li class="active">
                <a href="#tab_1" data-toggle="tab">
                    General </a>
            </li>
            <li>
                <a href="#tab_2" data-toggle="tab">
                    Mail Settings </a>
            </li>
            {{--<li>
                <a href="#tab_3" data-toggle="tab">
                     </a>
            </li>--}}
        </ul>
        <div class="tab-content">
            <div class="tab-pane" id="tab_3">

            </div>
            <div class="tab-pane" id="tab_2">
                <div class="form-inline">
                    <div class="form-group">
                        {!! Form::text('test_email',config('myapp.contact_email'),['id'=>'test_email','class'=>'form-control']) !!}
                    </div>
                    <button type="button" class="btn btn-primary" id="send_test_mail">Send Test Mail</button>
                </div>
                <hr>
                {!! form_row($form->mail_driver) !!}
                {!! form_row($form->mail_from_name) !!}
                {!! form_row($form->mail_from_address) !!}
                <div id="default" class="hide-mail-driver">
                    {!! form_row($form->mail_host) !!}
                    {!! form_row($form->mail_port) !!}
                    {!! form_row($form->mail_username) !!}
                </div>
                <div id="smtp" class="hide-mail-driver">
                    {!! form_row($form->mail_password) !!}
                    {!! form_row($form->mail_encryption) !!}
                </div>
                <div id="mailgun" class="hide-mail-driver">
                    {!! form_row($form->mailgun_domain) !!}
                    {!! form_row($form->mailgun_secret) !!}
                </div>
            </div>
            <div class="tab-pane active" id="tab_1">
                <div class="form-group">
                    <div class="row">
                        @if(isset($data->image) and $data->image)
                            <div class="col-md-3">
                                <img class="img-responsive" src="{{asset('uploads/settings/'.$data->image)}}" alt="">
                                <small class="btn btn-block btn-xs btn-danger delete-attachment">
                                    Delete
                                </small>
                            </div>
                        @endif
                        <div class="col-md-7">
                            {!! form_row($form->image) !!}
                        </div>
                    </div>
                </div>
                {!! form_rest($form) !!}
            </div>
        </div>
    </div>
</div>
<div class="form-actions">
    <button type="submit" class="btn blue">Save</button>
</div>
{!! form_end($form,false) !!}