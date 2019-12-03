{{--<section class="section bg-grey" id="page-title">
    <div class="container">
        <div class="page-caption">
            <h2 class="title is-3 has-no-space">{!! $page->title !!}</h2>

            @include('pages::public._page-breadcrumbs')

        </div>
    </div>
</section>--}}
@include('pages::public._page-breadcrumbs')

<div class="page-heading">
    <h1 class="title is-3 is-spaced">{!! $page->title !!}</h1>
</div>