<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title',$websiteTitle)</title>
<meta name="description" content="{!! config('myapp.website_description') !!}">
<meta name="keywords" content="{!! config('myapp.website_keywords') !!}">
<meta name="author" content="helpgeta services">
<meta name="csrf-token" content="{!! csrf_token() !!}">

<link rel="icon" type="image/x-icon" href="{{ asset('assets/public/img/fav.png') }}"/>

<link href="{{ asset('assets/public/css/all.css') }}" rel="stylesheet">


{!! config('myapp.google_analytics') !!}

@stack('css')