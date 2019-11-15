<div class="card category-card {!! isset($set_bg_grey) ? 'bg-grey':'' !!}">
    <a href="{!! $item->present()->url !!}">
        <div class="card-content">
            <figure class="category-icon">
                <img src="{{asset('uploads/categories/'.$item->icon)}}" alt="{!! $item->category !!}">
            </figure>
            <div class="category-title">
                <h4 class="title is-6">{!! $item->category !!}</h4>
            </div>
        </div>
    </a>
</div>