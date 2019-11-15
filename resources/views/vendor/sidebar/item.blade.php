<li class="nav-item @if($active)open active @endif @if($item->hasItems())  @endif">
    <a href="{{ $item->getUrl() }}" class="nav-link nav-toggle @if(count($appends) > 0) hasAppend @endif">
        <i class="{{ $item->getIcon() }}"></i>
        <span class="title">{{ $item->getName() }}</span>
        @if($active)
            <span class="selected"></span>
            <span class="arrow open"></span>
        @endif
        @if(count($items) > 0)
            <span class="arrow"></span>
            @endif
        @foreach($badges as $badge)
            {!! $badge !!}
        @endforeach

    </a>

    @foreach($appends as $append)
        {!! $append !!}
    @endforeach

    @if(count($items) > 0)
        <ul class="sub-menu">
            @foreach($items as $item)
                {!! $item !!}
            @endforeach
        </ul>
    @endif
</li>
