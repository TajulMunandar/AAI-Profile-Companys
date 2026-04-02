<div class="with-vertical"><!-- ---------------------------------- -->
    <!-- Start Vertical Layout Header -->
    <!-- ---------------------------------- -->
    <nav class="navbar navbar-expand-lg p-0">

        <ul class="navbar-nav">
            <li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
                <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>

        <div class="d-block d-lg-none py-4">
            <a href="/" class="text-nowrap logo-img">
                <img src="logo" class="dark-logo" alt="Logo-Dark" width="180" />
                <img src="logo" class="light-logo" alt="Logo-light" width="180" />
            </a>
        </div>

        <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)"
            data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="ti ti-dots fs-7"></i>
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between">
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <!-- ------------------------------- -->
                    <!-- start language Dropdown -->
                    <!-- ------------------------------- -->
                    <li class="nav-item nav-icon-hover-bg rounded-circle">
                        <a class="nav-link moon dark-layout" href="javascript:void(0)">
                            <i class="ti ti-moon moon"></i>
                        </a>
                        <a class="nav-link sun light-layout" href="javascript:void(0)">
                            <i class="ti ti-sun sun"></i>
                        </a>
                    </li>
                    <!-- ------------------------------- -->
                    <!-- end language Dropdown -->
                    <!-- ------------------------------- -->

                    <!-- ------------------------------- -->
                    <!-- start profile Dropdown -->
                    <!-- ------------------------------- -->

                    <li class="nav-item dropdown">
                        <a class="nav-link " href="javascript:void(0)" id="drop1" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src="{{ asset('assets/logoAAI.png') }}" class="rounded-circle"
                                        width="35" height="35" alt="user-profile" />
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    <img src="{{ asset('assets/logoAAI.png') }}" class="rounded-circle"
                                        width="80" height="80" alt="user-profile" />
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3">{{ auth()->user()->name ?? 'User' }}</h5>
                                        <span class="mb-1 d-block">{{ ucfirst(auth()->user()->is_admin ?? 'user') }}</span>
                                        <p class="mb-0 d-flex align-items-center gap-1">
                                            <i class="ti ti-mail fs-4"></i> {{ auth()->user()->email ?? '-' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="d-grid py-4 px-7 pt-8">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a href="{{ route('logout') }}" class="btn btn-outline-primary"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Log Out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- ------------------------------- -->
                    <!-- end profile Dropdown -->
                    <!-- ------------------------------- -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- ---------------------------------- -->
    <!-- End Vertical Layout Header -->
    <!-- ---------------------------------- -->

    <!-- ------------------------------- -->
    <!-- apps Dropdown in Small screen -->
    <!-- ------------------------------- -->
    <!--  Mobilenavbar -->
</div>
<div class="app-header with-horizontal">
    <nav class="navbar navbar-expand-xl container-fluid p-0">
        <ul class="navbar-nav align-items-center">
            <li class="nav-item nav-icon-hover-bg rounded-circle d-flex d-xl-none ms-n2">
                <a class="nav-link sidebartoggler" id="sidebarCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
            <li class="nav-item d-none d-xl-block">
                <a href="/" class="text-nowrap nav-link">
                    <img src="logo" class="dark-logo" width="180" alt="modernize-img" />
                    <img src="logo" class="light-logo" width="180" alt="modernize-img" />
                </a>
            </li>
        </ul>
        <div class="d-block d-xl-none">
            <a href="/" class="text-nowrap nav-link">
                <img src="logo" width="180" alt="modernize-img" />
            </a>
        </div>
        <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)"
            data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
            </span>
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                <a href="javascript:void(0)"
                    class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                    aria-controls="offcanvasWithBothOptions">
                    <i class="ti ti-align-justified fs-7"></i>
                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                    <!-- ------------------------------- -->
                    <!-- start language Dropdown -->
                    <!-- ------------------------------- -->
                    <li class="nav-item nav-icon-hover-bg rounded-circle">
                        <a class="nav-link moon dark-layout" href="javascript:void(0)">
                            <i class="ti ti-moon moon"></i>
                        </a>
                        <a class="nav-link sun light-layout" href="javascript:void(0)">
                            <i class="ti ti-sun sun"></i>
                        </a>
                    </li>

                    <!-- ------------------------------- -->
                    <!-- end language Dropdown -->
                    <!-- ------------------------------- -->

                    <!-- ------------------------------- -->
                    <!-- start notification Dropdown -->
                    <!-- ------------------------------- -->

                    <!-- ------------------------------- -->
                    <!-- end notification Dropdown -->
                    <!-- ------------------------------- -->

                    <!-- ------------------------------- -->
                    <!-- start profile Dropdown -->
                    <!-- ------------------------------- -->

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="javascript:void(0)" id="drop1" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <div class="user-profile-img">
                                    <img src="../assets/images/profile/user-1.jpg" class="rounded-circle"
                                        width="35" height="35" alt="modernize-img" />
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                            aria-labelledby="drop1">
                            <div class="profile-dropdown position-relative" data-simplebar>
                                <div class="py-3 px-7 pb-0">
                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                </div>
                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                    <img src="../assets/images/profile/user-1.jpg" class="rounded-circle"
                                        width="80" height="80" alt="modernize-img" />
                                    <div class="ms-3">
                                        <h5 class="mb-1 fs-3"> nama</h5>
                                        <span class="mb-1 d-block">admin</span>
                                        <p class="mb-0 d-flex align-items-center gap-1">
                                            <i class="ti ti-mail fs-4"></i> 089xxxxxx
                                        </p>
                                    </div>
                                </div>

                                <div class="d-grid py-4 px-7 pt-8">
                                    <form id="logout-form" action="" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                    <a href="" class="btn btn-outline-primary"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Log Out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- ------------------------------- -->
                    <!-- end profile Dropdown -->
                    <!-- ------------------------------- -->
                </ul>
            </div>
        </div>
    </nav>
</div>
