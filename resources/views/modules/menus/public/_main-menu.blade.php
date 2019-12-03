@if ($menu = Menus::getMenu($slug))
    @if ($menu->menu_links->count())
        @foreach ($menu->menu_links as $menu_link)
            @include('menus::public._main-menu-item')
        @endforeach
    @endif
@endif
<a href="{{route('categories')}}" class="navbar-item">
    Browse Services
</a>
<a href="{{route('register.artisan')}}" class="navbar-item has-text-primary">
    Become a Service Provider
</a>
