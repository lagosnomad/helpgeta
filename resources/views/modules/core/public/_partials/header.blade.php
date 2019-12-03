<mobile-nav v-cloak>
    @if(!$user)
        <div class="mobile-nav-buttons">
            @include(('users::public._guest-user-buttons'))
        </div>
    @endif
    <aside class="menu">
        <p class="menu-label">
            Navigation
        </p>
        {!! Menus::render('main','_main-menu') !!}
        @if($user && !$user->hasRoleName('Admin'))
            <p class="menu-label">
                My Account
            </p>
            @include('users::public._current-user',['show_name'=>true])
        @endif
    </aside>
</mobile-nav>

<header class="header">
    <nav class="navbar is-transparent  has-shadow">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="{!! url('/') !!}">
                    <img src="{{asset('assets/public/img/logo.png')}}" alt="Helpgeta Logo">
                </a>
                <nav-burger></nav-burger>
            </div>
            <div class="navbar-menu">
                <div class="navbar-start">
                    <div class="navbar-item">
                        <search-input></search-input>
                    </div>
                </div>
                <div class="navbar-end">
                    {!! Menus::render('main','_main-menu') !!}
                    @if($user && !$user->hasRoleName('Admin'))
                        @include(('users::public._current-user'))
                    @else
                        @include(('users::public._guest-user-buttons'))
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
<div class="has-padding-6 is-hidden-desktop has-bg-primary">
    <search-input></search-input>
</div>