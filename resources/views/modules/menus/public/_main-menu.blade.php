@if ($menu = Menus::getMenu($slug))
    @if ($menu->menu_links->count())
        @foreach ($menu->menu_links as $menu_link)
            @include('menus::public._main-menu-item')
        @endforeach
    @endif
@endif
