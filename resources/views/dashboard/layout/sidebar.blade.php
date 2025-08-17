
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Focus Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name ?? 'Focus User' }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('brands*') ? 'menu-open' : '' }}">
                    <a href="{{ route('brands.index') }}" class="nav-link {{ request()->is('brands*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Brands
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                    {{-- <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('brands.index') }}" class="nav-link {{ request()->routeIs('brands.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Brands</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('brands.create') }}" class="nav-link {{ request()->routeIs('brands.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>New Brand</p>
                            </a>
                        </li>
                    </ul> --}}
                </li>
                <li class="nav-item {{ request()->is('settings*') || request()->is('profile*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->is('settings*') || request()->is('profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}" style="margin: 0; padding: 0;">
                                @csrf
                                <button type="submit" class="nav-link w-100 text-left border-0 bg-transparent text-danger logout-btn" style="padding: 0.5rem 1rem; display: flex; align-items: center; transition: all 0.3s ease;">
                                    <i class="far fa-circle nav-icon text-danger"></i>
                                    <p style="margin: 0;" class="text-danger">Logout</p>
                                </button>
                            </form>
                        </li>

                        <style>
                            .logout-btn:hover {
                                background-color: #dc3545 !important;
                                color: white !important;
                                transform: translateX(5px);
                                border-radius: 5px;
                            }
                            .logout-btn:hover i,
                            .logout-btn:hover p {
                                color: white !important;
                            }
                            .logout-btn:hover i {
                                transform: rotate(360deg);
                                transition: transform 0.5s ease;
                            }
                        </style>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
