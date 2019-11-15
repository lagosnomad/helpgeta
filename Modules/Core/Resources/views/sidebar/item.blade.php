<li class="@if($active)open active @endif @if($item->hasItems())  @endif">
    <a href="{{ $item->getUrl() }}" class="text-center @if(count($appends) > 0) hasAppend @endif" aria-expanded="false">
        <i class="{{ $item->getIcon() }}"></i>
        <span>{{ $item->getName() }}</span>
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
