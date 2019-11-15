@if($categories = Categories::latest(5))
    <section class="section bg-grey">
        <div class="container">
            <div class="main-heading">
                <p>CHOOSE NEEDED SERVICE</p>
                <h2 class="title is-3 is-spaced">Browse <span>Services</span></h2>
            </div>
            <div class="columns" id="category-listing">
                @foreach($categories as $category)
                    <div class="column">
                        @include('categories::public._list-item',['item'=>$category])
                    </div>
                @endforeach
            </div>
            <div class="has-text-centered" style="margin-top: 20px;">
                <a href="{{ route('categories') }}" class="button is-primary is-medium is-uppercase">
                    Browse All
                </a>
            </div>
        </div>
    </section>
@endif