<article class="media">
    <div class="media-left">
        <figure class="image is-64x64">
            <img src="{!! $user->present()->thumbSrc(64,64,[],'avatar') !!}" alt="Image" class="is-circled">
        </figure>
    </div>
    <div class="media-content">
        <div class="content">
            <h1 class="title is-3 has-text-weight-semibold">{!! $user->present()->fullname !!}</h1>
            <p class="subtitle is-7">Member since {!! $user->present()->createdAt !!}</p>
        </div>
        <nav class="level is-mobile">
            <div class="level-left">
                <a class="level-item">
                    <span class="icon is-small">
                      <i class="fa fa-edit" aria-hidden="true"></i>
                    </span> Edit Profile
                </a>
                <a class="level-item" href="{{url('auth/logout')}}">
                    <span class="icon is-small">
                      <i class="fa fa-sign-out" ></i>
                    </span> Logout
                </a>
            </div>
        </nav>
    </div>
</article>