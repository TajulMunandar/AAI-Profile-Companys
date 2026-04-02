<!-- Sidebar scroll-->
<div>
    <!-- Sidebar navigation-->
    <nav id="sidebarnavh" class="sidebar-nav scroll-sidebar container-fluid">
        <ul id="sidebarnav">

            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" aria-expanded="false">
                    <span><i class="ti ti-home-2"></i></span>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider my-2">

            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/users*') ? 'active' : '' }}"
                    href="{{ route('dashboard.users.index') }}" aria-expanded="false">
                    <span><i class="ti ti-user"></i></span>
                    <span class="hide-menu">User</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/projects*') ? 'active' : '' }}"
                    href="{{ route('dashboard.projects.index') }}" aria-expanded="false">
                    <span><i class="ti ti-briefcase"></i></span>
                    <span class="hide-menu">Projects</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/clients*') ? 'active' : '' }}"
                    href="{{ route('dashboard.clients.index') }}" aria-expanded="false">
                    <span><i class="ti ti-users"></i></span>
                    <span class="hide-menu">Clients</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/services*') ? 'active' : '' }}"
                    href="{{ route('dashboard.services.index') }}" aria-expanded="false">
                    <span><i class="ti ti-tools"></i></span>
                    <span class="hide-menu">Services</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/articles*') ? 'active' : '' }}"
                    href="{{ route('dashboard.articles.index') }}" aria-expanded="false">
                    <span><i class="ti ti-file-text"></i></span>
                    <span class="hide-menu">Article</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/contacts*') ? 'active' : '' }}"
                    href="{{ route('dashboard.contacts.index') }}" aria-expanded="false">
                    <span><i class="ti ti-phone"></i></span>
                    <span class="hide-menu">Contact</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link {{ request()->is('dashboard/kategoris*') ? 'active' : '' }}"
                    href="{{ route('dashboard.kategoris.index') }}" aria-expanded="false">
                    <span><i class="ti ti-category"></i></span>
                    <span class="hide-menu">Kategori</span>
                </a>
            </li>

        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->
