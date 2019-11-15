<li id="menuitem_{{ $menu_link->id }}" class="{{ $menu_link->class }}" role="menuitem">
    <a href="{{ url($menu_link->href) }}" @if($menu_link->target) target="{{ $menu_link->target }}" @endif @if($menu_link->items->count()) class="dropdown-toggle" data-toggle="dropdown" @endif>
        @if ($menu_link->icon_class)
            <span class="{{ $menu_link->icon_class }}"></span>
        @endif
        {{ $menu_link->title }}
        @if ($menu_link->items->count())
            <span class="caret"></span>
        @endif
    </a>
    @if ($menu_link->items->count())
        <ul class="dropdown-menu">
            @foreach ($menu_link->items as $menu_link)
                @include('menus::public._item', ['menu_link' => $menu_link])
            @endforeach
        </ul>
    @endif
</li>
