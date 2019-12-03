<div class="card artisan-card bg-grey">
    <div class="card-content">
        <div class="media">
            <div class="media-left">
                <figure class="image is-64x64">
                    <img src="{!! $item->user->present()->thumbSrc(64,64,[],'avatar') !!}" class="is-circled"
                         alt="Placeholder image">
                </figure>h
            </div>
            <div class="media-content">
                <a href="{!! $item->present()->url !!}" class="artisan-card-name">
                    {!! $item->present()->businessName !!}
                    {{--{!! $item->busines_name != '' ? $item->busines_name : $item->user->present()->fullname !!}--}}
                </a>
                <div class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <span class="icon"><i class="fa fa-suitcase"></i></span>
                            {!! $item->present()->categoriesList !!}
                        </div>
                        <div class="level-item">
                            <span class="icon"><i class="fa fa-map-marker"></i></span>
                            Surulere, Lagos
                        </div>
                    </div>
                </div>
            </div>
            <div class="media-right">
                <div class="ratings">
                    <span class="average-rating is-size-7">0.0</span>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <span class="is-size-7">0 Reviews</span>
                </div>
                <div class="buttons">
                    <a href="{!! $item->present()->url.'?service='.$category_slug !!}" class="button is-primary is-outlined is-small">View Profile</a>
                    <a href="#" class="button is-primary is-small">Request Service</a>
                </div>
            </div>
        </div>
    </div>
</div>