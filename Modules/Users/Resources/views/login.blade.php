@extends('core::admin.master')

@section('page-css')
	<link href="{{asset('assets/admin/pages/css/login.css')}}" rel="stylesheet" type="text/css"/>
	<style>
		body.page-md{
			background: #fff;
		}
		.blue-dark.btn {
			color: #FFFFFF;
			background-color: #014A98;
		}
		.login .content {
			background-color: #eee;
		}
		.login .content .form-control {
			background-color: #fff;
			height: 43px;
			color: #8290a3;
			border: 1px solid #dde3ec;
		}

		.logo img{
			width:220px;
		}

	</style>
@stop

@section('body-class')
	login
@stop

@section('main-footer')
	<div class="copyright">
		{{date('Y')}} © {{config('myapp.website_title')}}
	</div>
@stop

@section('page-js')
	<script src="{{asset('assets/admin/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('assets/admin/pages/scripts/login.js')}}" type="text/javascript"></script>
	<script>
		jQuery(document).ready(function() {
			Login.init();
		});
	</script>
@stop

@section('main-body')
	@if(!is_null(config('myapp.image')))
	<div class="logo">
		<a href="{{url('/')}}">
			<img src="{{asset('uploads/settings/'.config('myapp.image'))}}" alt="logo"/>
		</a>
	</div>
	@endif
	{{--<h2 class="text-center" style="color:#181B1F;font-weight:bold;margin-top:100px;">{{config('myapp.website_name')}}</h2>--}}
	<div class="content">
		@include('core::admin._message', ['closable' => false])
		<!-- BEGIN LOGIN FORM -->
		{!! form_start($form,['class'=>'']) !!}
			<h3 class="form-title font-dark">Sign In</h3>
			<div class="alert alert-danger display-hide">
				<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
			</div>
			<div class="form-group">
				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
				<label class="control-label visible-ie8 visible-ie9">Username</label>
				{!! form_widget($form->email) !!}
			</div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">Password</label>
				{!! form_widget($form->password) !!}
			</div>
			<div class="form-actions">
				{{--{!! form_widget($form->login) !!}--}}
				<button class="form-contrl btn dark uppercase btn-block" type="submit">Login</button>
				{{--<label class="rememberme check">
					<input type="checkbox" name="remember" value="1"/>Remember </label>--}}
				<!--a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a-->
			</div>
		{!! form_end($form,false) !!}
		{{--<a href="{{url('/')}}" class="btn btn-danger btn-sm btn-block"><i class="fa fa-arrow-left"></i> back to website</a>--}}
	</div>
@stop


