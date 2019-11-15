<!DOCTYPE html>
<html>

    @include('core::public._partials.head')

<body>
    @include('core::public._partials.header')

    @yield('main')

    @include('core::public._partials.footer')


    @include('core::public._partials.bottom')

</body>

</html>