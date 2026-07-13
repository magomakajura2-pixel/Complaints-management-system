<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('admin/assets/images/user/user.png') }}" alt="User-Profile-Image">
                    <div class="user-details">
                        <span>{{ session('user_name', 'User') }}</span>
                        <div id="more-details">{{ session('user_email', '') }}<i class="fa fa-chevron-down m-l-5"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="{{ route('user.profile') }}"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                        <li class="list-group-item"><a href="{{ route('user.settings') }}"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                        <li class="list-group-item"><a href="{{ route('user.logout') }}"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>User Side</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}" class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.complaints.create') }}" class="nav-link {{ request()->routeIs('user.complaints.create') ? 'active' : '' }}"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Lodge Complaint</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.complaints.index') }}" class="nav-link {{ request()->routeIs('user.complaints.index') ? 'active' : '' }}"><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Complaint History</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
