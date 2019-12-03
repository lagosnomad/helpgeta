<div class="navbar-item has-dropdown is-hoverable">
    <div class="navbar-link">
        <figure class="image profile-image vertical-middle is-pulled-left">
            <img src="{!! $user->present()->thumbSrc(40,40,[],'avatar') !!}">
        </figure>
        @if(isset($show_name))
            <a class="username is-pulled-left has-margin-l-5" href="#">{!! $user->username!!}</a>
        @endif
    </div>
    <div class="is-clearfix"></div>
    <div class="navbar-dropdown is-boxed is-right">
       {{-- <a class="navbar-item" href="{{route('account.dashboard')}}">
            Dashboard
        </a> --}}
        <a class="navbar-item" href="{{route('account.orders.index')}}">
            Manage Requests
        </a>
        <a class="navbar-item" href="{{route('profile.index')}}">
            My Profile
        </a>
        <a class="navbar-item" href="{{route('profile.change-password')}}">
            Change Password
        </a>
        <hr class="navbar-divider">
        <a class="navbar-item" href="{{route('logout')}}">
            <span class="icon"><i class="fa fa-sign-out"></i></span> Logout
        </a>
    </div>
</div>