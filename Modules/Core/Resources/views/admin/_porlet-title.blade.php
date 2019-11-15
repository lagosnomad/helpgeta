<div class="portlet-title">
    @include('core::admin._porlet-caption', ['module' => $module])
    <div class="actions">
        @if(isset($type))
            @include('core::admin._button-'.$type, ['module' => $module,'caption'=>$caption])
        @else
            @include('core::admin._button-create', ['module' => $module])
        @endif
        @include('core::admin._button-fullscreen')
    </div>
</div>