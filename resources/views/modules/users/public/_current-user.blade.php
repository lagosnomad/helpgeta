
<div class="navbar-item has-dropdown is-hoverable has-text-centered">
    <figure class="image profile-image vertical-middle">
        <img src="{!! $user->present()->thumbSrc(40,40,[],'avatar') !!}">
    </figure>
    <a class="navbar-link" href="#">{!! $user->present()->fullname !!}</a>
    <div class="navbar-dropdown is-boxed">
        <a class="navbar-item" href="{{route('account.dashboard')}}" >
            Dashboard
        </a>
        <a class="navbar-item" href="{{route('profile.index')}}" >
            My Profile
        </a>
        <a class="navbar-item" href="{{route('profile.change-password')}}">
            Change Password
        </a>
        <hr class="navbar-divider">
        <a class="navbar-item" href="{{route('logout')}}">
            <span class="icon"><i class="fa fa-sign-out"></i></span> Logout
        </a>
        <hr class="navbar-divider">
        <a href="{!! route('categories') !!}" class="button is-primary ">Make a Request</a>
    </div>
</div>