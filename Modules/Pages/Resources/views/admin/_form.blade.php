@section('page-breadcrumbs')
    <li>
        <a href="javascript:;">Pages</a>
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
                    Body </a>
            </li>
            <li>
                <a href="#tab_3" data-toggle="tab">
                    Meta </a>
            </li>
            <li>
                <a href="#tab_4" data-toggle="tab">
                    File </a>
            </li>
            <li>
                <a href="#tab_5" data-toggle="tab">
                    Option </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <div class="row">
                    <div class="col-md-6">
                        {!! form_row($form->title) !!}
                    </div>
                    <div class="col-md-6">
                        {!! form_row($form->slug) !!}
                    </div>
                    <div class="col-md-6">
                        {!! form_row($form->tagline) !!}
                    </div>
                    <div class="col-md-6">
                        {!! form_row($form->parent_id) !!}
                    </div>
                    <div class="col-md-6">
                        {!! form_row($form->status) !!}
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_2">
                <div class="row">
                    <div class="col-md-12">
                        {!! form_widget($form->body) !!}
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_3">
                <div class="row">
                    <div class="col-md-6">
                        {!! form_row($form->meta_title) !!}
                    </div>
                    <div class="col-md-6">
                        {!! form_row($form->meta_keywords) !!}
                    </div>
                    <div class="col-md-6">
                        {!! form_row($form->meta_description) !!}
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_4">
                <div class="row">
                    <div class="col-md-6">
                        {!! form_row($form->image) !!}
                    </div>
                    <div class="col-md-6">
                        {!! form_row($form->css) !!}
                    </div>
                    <div class="col-md-6">
                        {!! form_row($form->js) !!}
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab_5">
                <div class="row">
                    <div class="col-md-6">
                        {!! form_row($form->module) !!}
                    </div>
                    <div class="col-md-6">
                        {!! form_row($form->template) !!}
                    </div>
                    @if(!$model->id)
                    <div class="col-md-6">
                        {!! form_row($form->add_to_menu,['attr'=>['name'=>'menus[]']]) !!}
                    </div>
                    @endif
                    <div class="col-md-12">
                        {!! form_row($form->is_home) !!}
                        {{--<div class="form-group">
                            <div class="checkbox-list">
                                <label>
                                    {!! Form::checkbox('is_home',1,null) !!} Is Home</label>
                            </div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('core::admin._buttons-form')
{!! form_end($form,false) !!}
