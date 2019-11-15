<a href="{{ url($menu_link->href) }}" @if($menu_link->target) target="{{ $menu_link->target }}"
   @endif  class="navbar-item @if($menu_link->items->count()) dropdown-toggle  @endif"
   data-toggle="@if($menu_link->items->count()) dropdown @endif">
    @if ($menu_link->icon_class)
        <span class="{{ $menu_link->icon_class }}"></span>
    @endif
    {{ $menu_link->title }}
    {{--@if ($menu_link->items->count())
            <span class="caret"></span>
    @endif--}}
</a>
@if ($menu_link->items->count())
    <ul class="sub-menu" role="menu">
        @foreach ($menu_link->items as $menu_link)
            @include('menus::public._item', ['menu_link' => $menu_link])
        @endforeach
    </ul>
@endif






