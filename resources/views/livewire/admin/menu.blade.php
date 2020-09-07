<div>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion {{ $isMenuCollapsed ? 'toggled' : '' }}"
        id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.home') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Renda P.</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item  {{ request()->routeIs('admin.home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ request()->routeIs('admin.persons*') ? 'active' : '' }}">
            <a class="nav-link {{ request()->routeIs('admin.persons*') ? '' : 'collapsed' }}" href="#"
                data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="{{ request()->routeIs('admin.persons*') ? 'true' : 'false' }}"
                aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>CRUD</span>
            </a>
            <div id="collapseTwo"
                class="collapse {{ !$isMenuCollapsed && request()->routeIs('admin.persons') ? 'show' : '' }}"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ request()->routeIs('admin.persons') ? 'active' : '' }}"
                        href="{{ route('admin.persons') }}">Persons</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button type="button" class="rounded-circle border-0" id="sidebarToggle" wire:click="collapseMenu"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
</div>
