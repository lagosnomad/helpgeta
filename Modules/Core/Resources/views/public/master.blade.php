<!DOCTYPE html>
    <!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
    <!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
    <!--[if !IE]><!-->
    <html lang="en">
    <!--<![endif]-->

    <head>

        @include('core::public._partials.head')

    </head>

    <body>

    @yield('main')

    @include('core::public._partials.footer')

    </body>
</html>
