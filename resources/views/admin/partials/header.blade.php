<header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
    <div class="m-header">
        <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
        <a href="{{ route('admin.dashboard') }}" class="b-brand">
            <strong>Complaint Management</strong>
        </a>
        <a href="#!" class="mob-toggler">
            <i class="feather icon-more-vertical"></i>
        </a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="icon feather icon-bell"></i>
                        @php
                            $pendingCount = \App\Models\Complaint::whereNull('complaints.status')->count();
                        @endphp
                        <span class="badge badge-pill badge-danger">{{ $pendingCount }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right notification">
                        <div class="noti-head">
                            <h6 class="d-inline-block m-b-0">Notifications</h6>
                        </div>
                        <ul class="noti-body">
                            @php
                                $pendingComplaints = \App\Models\Complaint::whereNull('complaints.status')
                                    ->join('users', 'users.id', '=', 'complaints.userId')
                                    ->select('complaints.*', 'users.fullName as name')
                                    ->get();
                            @endphp
                            @foreach($pendingComplaints as $pc)
                            <li class="notification">
                                <div class="media">
                                    <img class="img-radius" src="{{ asset('admin/assets/images/user/user.png') }}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <p><strong>{{ $pc->name }}</strong></p>
                                        <p>Complaint No.<a href="{{ route('admin.complaints.show', $pc->complaintNumber) }}">{{ $pc->complaintNumber }} at <small>{{ $pc->regDate }}</small></a></p>
                                    </div>
                                </div>
                                <br>
                            </li>
                            @endforeach
                        </ul>
                        <div class="noti-footer">
                            <a href="{{ route('admin.complaints.index') }}">show all</a>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <div class="dropdown drp-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="feather icon-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-notification">
                        <div class="pro-head">
                            <img src="{{ asset('admin/assets/images/user/user-gear.png') }}" class="img-radius" alt="User-Profile-Image">
                            <span>{{ session('admin_username', 'Admin') }}</span>
                            <a href="{{ route('admin.logout') }}" class="dud-logout" title="Logout">
                                <i class="feather icon-log-out"></i>
                            </a>
                        </div>
                        <ul class="pro-body">
                            <li><a href="{{ route('admin.profile') }}" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
                            <li><a href="{{ route('admin.settings') }}" class="dropdown-item"><i class="feather icon-mail"></i> Settings</a></li>
                            <li><a href="{{ route('admin.logout') }}" class="dropdown-item"><i class="feather icon-lock"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</header>
