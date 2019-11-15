<div class="content">
    <h3 class="title is-5"><span class="has-text-primary">{{$artisans->count()}}</span> Service Provider(s) Available
    </h3>
</div>

@include('artisans::public._filter')

<div id="artisan-listings" class="list-view">
    @foreach($artisans as $artisan)
        @include('artisans::public._list-item',['item'=>$artisan])
    @endforeach
</div>