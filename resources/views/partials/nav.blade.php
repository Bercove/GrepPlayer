<!-- Sidebar  -->
<div class="iq-sidebar">
    <div class="iq-sidebar-logo d-flex justify-content-between">
    <a href="{{ route('dashboard.index') }}" class="header-logo">
        <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
        <div class="logo-title">
            <span class="text-primary text-uppercase">Grep Player</span> 
        </div>
    </a>
    <div class="iq-menu-bt-sidebar">
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="main-circle"><i class="las la-bars"></i></div>
            </div>
        </div>
    </div>
    </div>
    <div id="sidebar-scrollbar">
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">
            <li class="active active-menu">
                <a href="#dashboard" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Dashboard</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="dashboard" class="iq-submenu collapse show" data-parent="#iq-sidebar-toggle">
                <li class="active">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="las la-house-damage"></i>Home
                    </a>
                </li>
                <li><a href="{{ route('dashboard.last-fm.artist.show') }}"><i class="las la-headphones"></i>Artists</a></li>
                <li><a href="{{ route('dashboard.last-fm.album.show') }}"><i class="lar la-file-audio"></i>Albums</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    </div>
</div>
<!-- TOP Nav Bar -->
<div class="iq-top-navbar">
    <div class="iq-navbar-custom">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="iq-menu-bt d-flex align-items-center">
                <div class="wrapper-menu">
                    <div class="main-circle"><i class="las la-bars"></i></div>
                </div>
                <div class="iq-navbar-logo d-flex justify-content-between">
                    <a href="{{ route('dashboard.index') }}" class="header-logo">
                    <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
                    <div class="pt-2 pl-2 logo-title">
                        <span class="text-primary text-uppercase">Grep Player</span>
                    </div>
                    </a>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-label="Toggle navigation">
                <i class="ri-menu-3-line"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="list-unstyled iq-menu-top d-flex justify-content-between mb-0 p-0">
                    <li class="active"><a href="{{ route('dashboard.index') }}">Home</a></li>
                    <li><a href="{{ route('dashboard.last-fm.artist.show') }}">Artists</a></li>
                    <li><a href="{{ route('dashboard.last-fm.album.show') }}">Albums</a></li>
                </ul>
                <ul class="navbar-nav ml-auto navbar-list">
                    <li class="nav-item nav-icon">
                    <div class="iq-search-bar">
                        <form action="{{ route('dashboard.last-fm.search.show') }}" 
                        enctype="multipart/form-data"
                        role="search"
                        method="GET" class="searchbox">
                            <input type="text" name="q" maxlength="100" class="text search-input" placeholder="Search Here..">
                            <a class="search-link" href="#"><i class="ri-search-line text-black"></i></a>
                            <a class="search-audio" href="#"><i class="las la-microphone text-black"></i></a>
                        </form>
                    </div>
                    </li>
                    <li class="nav-item nav-icon search-content">
                    <a href="#" class="search-toggle iq-waves-effect text-gray rounded"><span class="ripple rippleEffect " ></span>
                        <i class="ri-search-line text-black"></i>
                    </a>
                    <form action="{{ route('dashboard.last-fm.search.show') }}" 
                        enctype="multipart/form-data"
                        role="search"
                        method="GET" class="search-box p-0">
                        <input type="text" name="q" maxlength="100" class="text search-input" placeholder="Type here to search...">
                        <a class="search-link" href="#"><i class="ri-search-line text-black"></i></a>
                        <a class="search-audio" href="#"><i class="las la-microphone text-black"></i></a>
                    </form>
                    </li>
                    <li class="line-height pt-3">
                    <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                        <img src="{{ Auth::user()->google_avatar }}" class="img-fluid rounded-circle" alt="user">
                    </a>
                    <div class="iq-sub-dropdown iq-user-dropdown">
                        <div class="iq-card shadow-none m-0">
                            <div class="iq-card-body p-0 ">
                                <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">{{ Auth::user()->name }}</h5>
                                    <span class="text-white font-size-12">{{ Auth::user()->email }}</span>
                                </div>
                                <a href="{{ route('dashboard.profile.index') }}" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                        <div class="rounded iq-card-icon iq-bg-primary">
                                            <i class="ri-file-user-line"></i>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0 ">My Profile</h6>
                                            <p class="mb-0 font-size-12">View personal profile details.</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('dashboard.profile.edit') }}" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                        <div class="rounded iq-card-icon iq-bg-primary">
                                            <i class="ri-profile-line"></i>
                                        </div>
                                        <div class="media-body ml-3">
                                            <h6 class="mb-0 ">Edit Profile</h6>
                                            <p class="mb-0 font-size-12">Modify your personal details.</p>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-inline-block w-100 text-center p-3">
                                    <a class="bg-primary iq-sign-btn" href="{{ route('logout') }}" 
                                            onclick="event.preventDefault(); 
                                                    document.getElementById('logout-form').submit();" role="button">Sign out<i class="ri-login-box-line ml-2"></i></a>
                                    
                                    <form 
                                        id="logout-form" 
                                        action="{{ route('logout') }}" 
                                        method="POST" 
                                        style="display: none;">

                                        {{ csrf_field() }}

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- TOP Nav Bar END -->