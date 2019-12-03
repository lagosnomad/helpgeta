<!DOCTYPE html>
<html>

<head>
    @include('core::public._partials.head')
</head>

<body>
<div id="app">
    <vue-progress-bar></vue-progress-bar>

    @include('core::public._partials.header')

    @yield('main')

    @include('core::public._partials.footer')

</div>

@include('core::public._partials.bottom')

</body>

</html>