<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->
<!-- [ navigation menu ] start -->
<nav class="pcoded-navbar  ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >
            
            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="{{ asset('admin/assets/images/user/user-gear.png') }}" alt="User-Profile-Image">
                    <div class="user-details">
                        <span>{{ session('admin_username', 'Admin') }}</span>
                        <div id="more-details">{{ session('admin_email', '') }}<i class="fa fa-chevron-down m-l-5"></i></div>
                    </div>
                </div>
                <div class="collapse" id="nav-user-link">
                    <ul class="list-unstyled">
                        <li class="list-group-item"><a href="{{ route('admin.profile') }}"><i class="feather icon-user m-r-5"></i>View Profile</a></li>
                        <li class="list-group-item"><a href="{{ route('admin.settings') }}"><i class="feather icon-settings m-r-5"></i>Settings</a></li>
                        <li class="list-group-item"><a href="{{ route('admin.logout') }}"><i class="feather icon-log-out m-r-5"></i>Logout</a></li>
                    </ul>
                </div>
            </div>
            
            <ul class="nav pcoded-inner-navbar ">
                <li class="nav-item pcoded-menu-caption">
                    <label>Admin Management</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index') }}" class="nav-link {{ request()->routeIs('admin.category.*') ? 'active' : '' }}"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Add Category</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.subcategory.index') }}" class="nav-link {{ request()->routeIs('admin.subcategory.*') ? 'active' : '' }}"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Add Subcategory</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.state.index') }}" class="nav-link {{ request()->routeIs('admin.state.*') ? 'active' : '' }}"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Add State</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Manage Users</span></a>
                </li>
                
                <li class="nav-item pcoded-menu-caption">
                    <label>User Complaints</label>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link {{ request()->routeIs('admin.complaints.*') ? 'active' : '' }}"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Manage Complaint</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{ route('admin.complaints.index') }}">All Complaints</a></li>
                        <li><a href="{{ route('admin.complaints.status', 'not_processed') }}">Not Process Yet</a></li>
                        <li><a href="{{ route('admin.complaints.status', 'in_process') }}">In Process</a></li>
                        <li><a href="{{ route('admin.complaints.status', 'closed') }}">Closed Complaints</a></li>
                    </ul>
                </li>
                
                <li class="nav-item pcoded-menu-caption">
                    <label>Reports</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.reports.users') }}" class="nav-link {{ request()->routeIs('admin.reports.users') ? 'active' : '' }}"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">User Reports</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.reports.complaints') }}" class="nav-link {{ request()->routeIs('admin.reports.complaints') ? 'active' : '' }}"><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Complaints Report</span></a>
                </li>
                
                <li class="nav-item pcoded-menu-caption">
                    <label>Search</label>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.search') }}" class="nav-link {{ request()->routeIs('admin.users.search') ? 'active' : '' }}"><span class="pcoded-micon"><i class="feather icon-search"></i></span><span class="pcoded-mtext">User Search</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.complaints.search') }}" class="nav-link {{ request()->routeIs('admin.complaints.search') ? 'active' : '' }}"><span class="pcoded-micon"><i class="feather icon-search"></i></span><span class="pcoded-mtext">Search Complaint</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->
