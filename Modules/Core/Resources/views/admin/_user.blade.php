<li>
    <a href="{{url('/')}}" class="" style="color:#DB0000;margin-top:7px;">View website</a>
</li>
<!-- BEGIN NOTIFICATION DROPDOWN -->
<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
<li class="dropdown dropdown-user dropdown-dark">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="username username-hide-on-mobile">
						{{current_user_email()}} </span>
        <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
        <img alt="" class="img-circle" src="{{asset('assets/admin/theme/img/avatar.png')}}"/>
    </a>
    <ul class="dropdown-menu dropdown-menu-default">
        <li>
            <a href="#">
                <i class="icon-user"></i> My Profile </a>
        </li>
        <li>
            <a href="{{route('admin.users.change-password')}}">
                <i class="icon-key"></i> Change Password </a>
        </li>
        <li>
            <a href="{{route('logout')}}">
                <i class="icon-logout"></i> Log Out </a>
        </li>
    </ul>
</li>
<!-- END USER LOGIN DROPDOWN -->
