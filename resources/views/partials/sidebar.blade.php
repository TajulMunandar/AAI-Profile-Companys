<div><!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="/dashboard" class="text-nowrap logo-img">
            <img src="{{asset('assets/logowebsiteaai.png')}}" class="dark-logo" alt="Logo-Dark" width="100%"/>
            <img src="{{asset('assets/logowebsiteaai.png')}}" class="light-logo" alt="Logo-light" width="100%"/>
        </a>
        <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
            <i class="ti ti-x"></i>
        </a>
    </div>

    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
        <ul id="sidebarnav">
            <!-- ---------------------------------- -->
            <!-- Dashboard -->
            <!-- ---------------------------------- -->
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" aria-expanded="false">
                    <span><i class="ti ti-home-2"></i></span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>

            <!-- ---------------------------------- -->
            <!-- Content Management -->
            <!-- ---------------------------------- -->
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Content Management</span>
            </li>

            <!-- Projects -->
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/projects*') ? 'active' : '' }}"
                    href="{{ route('dashboard.projects.index') }}" aria-expanded="false">
                    <i class="ti ti-briefcase"></i>
                    <span class="hide-menu">Projects</span>
                </a>
            </li>

            <!-- Sliders -->
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/sliders*') ? 'active' : '' }}"
                    href="{{ route('dashboard.sliders.index') }}" aria-expanded="false">
                    <i class="ti ti-pencil"></i>
                    <span class="hide-menu">Sliders</span>
                </a>
            </li>

            <!-- Services -->
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/services*') ? 'active' : '' }}"
                    href="{{ route('dashboard.services.index') }}" aria-expanded="false">
                    <i class="ti ti-tools"></i>
                    <span class="hide-menu">Services</span>
                </a>
            </li>

            <!-- Articles -->
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/articles*') ? 'active' : '' }}"
                    href="{{ route('dashboard.articles.index') }}" aria-expanded="false">
                    <i class="ti ti-file-text"></i>
                    <span class="hide-menu">Articles</span>
                </a>
            </li>

            <!-- Kategori -->
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/kategoris*') ? 'active' : '' }}"
                    href="{{ route('dashboard.kategoris.index') }}" aria-expanded="false">
                    <i class="ti ti-category"></i>
                    <span class="hide-menu">Categories</span>
                </a>
            </li>

            <!-- Certifications -->
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/certifications*') ? 'active' : '' }}"
                    href="{{ route('dashboard.certifications.index') }}" aria-expanded="false">
                    <i class="ti ti-award"></i>
                    <span class="hide-menu">Certifications</span>
                </a>
            </li>

            <!-- Job Vacancies -->
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/job-vacancies*') ? 'active' : '' }}"
                    href="{{ route('dashboard.job-vacancies.index') }}" aria-expanded="false">
                    <i class="ti ti-briefcase"></i>
                    <span class="hide-menu">Job Vacancies</span>
                </a>
            </li>

            <!-- Job Applications -->
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/job-applications*') ? 'active' : '' }}"
                    href="{{ route('dashboard.job-applications.index') }}" aria-expanded="false">
                    <i class="ti ti-file-description"></i>
                    <span class="hide-menu">Job Applications</span>
                </a>
            </li>

            <!-- ---------------------------------- -->
            <!-- Communication -->
            <!-- ---------------------------------- -->
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">Communication</span>
            </li>

            <!-- Comments -->
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/comments*') ? 'active' : '' }}"
                    href="{{ route('dashboard.comments.index') }}" aria-expanded="false">
                    <i class="ti ti-message"></i>
                    <span class="hide-menu">Comments</span>
                </a>
            </li>

            <!-- Contact Messages -->
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/contacts*') ? 'active' : '' }}"
                    href="{{ route('dashboard.contacts.index') }}" aria-expanded="false">
                    <i class="ti ti-phone"></i>
                    <span class="hide-menu">Contact Messages</span>
                </a>
            </li>

            <!-- ---------------------------------- -->
            <!-- People -->
            <!-- ---------------------------------- -->
            <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu">People</span>
            </li>

            <!-- Clients -->
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/clients*') ? 'active' : '' }}"
                    href="{{ route('dashboard.clients.index') }}" aria-expanded="false">
                    <i class="ti ti-users"></i>
                    <span class="hide-menu">Clients</span>
                </a>
            </li>

            <!-- Equipment -->
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/equipment*') ? 'active' : '' }}"
                    href="{{ route('dashboard.equipment.index') }}" aria-expanded="false">
                    <i class="ti ti-truck"></i>
                    <span class="hide-menu">Heavy Equipment</span>
                </a>
            </li>

            <!-- Users -->
            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/users*') ? 'active' : '' }}"
                    href="{{ route('dashboard.users.index') }}" aria-expanded="false">
                    <i class="ti ti-user"></i>
                    <span class="hide-menu">Users</span>
                </a>
            </li>

        </ul>
    </nav>


    <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
        <div class="hstack gap-3">
            <div class="john-img">
                <img src="{{ asset('assets/logoAAI.png') }}" class="rounded-circle" width="40" height="40"
                    alt="user-profile" />
            </div>
            <div class="john-title">
                <h6 class="mb-0 fs-4 fw-semibold">{{ auth()->user()->name ?? 'User' }}</h6>
                <span class="fs-2">{{ ucfirst(auth()->user()->is_admin ?? 'user') }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button"
                    aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- ---------------------------------- -->
    <!-- End Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
</div>
