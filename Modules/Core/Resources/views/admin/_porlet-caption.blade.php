<div class="caption caption-md">
    <i class="icon-bar-chart theme-font-color hide"></i>
    <span class="caption-subject theme-font-color bold uppercase">
        @if(isset($caption))
            @Lang($module . '::global.'.$caption)
        @else
            @Lang($module . '::global.index')
        @endif
    </span>
</div>