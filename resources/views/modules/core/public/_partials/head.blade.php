<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title',$websiteTitle)</title>
    <meta name="csrf-token" content="{!! csrf_token() !!}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css">
    <link href="{{ asset('assets/public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/public/css/components.css') }}" rel="stylesheet">
    <style>
        #category-listing .card .card-content img {
            display: inline-block;
            background: #363636;
            border-radius: 50%;
            padding: 10px;
            width: 60px
        }

        #series-listing .tabs.is-toggle li.is-active a {
            color: #fff;
            z-index: 1;
            background-color: #044ead;
            border-color: #044ead;
        }

        #series-listing .series-item .badge {
            left: 20px;
            top: 30%;
        }

        #series-listing .card-image {
            position: relative;
        }

        #series-listing .card-image .overlay {
            position: absolute;
            background: rgba(0, 0, 0, .6);
            z-index: 1;
            width: 100%;
            height: 100%;
        }

        #series-listing .series-item .badge {
            z-index: 2;
            top: 1.5rem;
            left:1.5rem;
        }

    </style>
    @stack('css')
</head>



