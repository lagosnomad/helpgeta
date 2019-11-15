@if($page->body != '')
    <div class="content">
        @include('pages::public._page-content-photo')
        {!! $page->body !!}
    </div>
@endif
