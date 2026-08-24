<!-- Main Sidebar Container -->
<aside id="mainSidebar" class="main-sidebar sidebar-dark-navy elevation-4">
    <!-- Brand Logo - DYNAMIC -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ $logo }}" alt="{{ $appName }} Logo" class="brand-image elevation-0">
        <span class="brand-text font-weight-light">{{ $appName }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user() && Auth::user()->image ? asset('storage/' . Auth::user()->image) : asset('admin/dist/img/user2-160x160.jpg') }}" 
                     class="img-circle elevation-0" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name ?? 'MD Asif' }}</a>
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
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Route::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-header text-uppercase text-xs text-muted font-weight-bold">ADMIN MANAGEMENT</li>

                <!-- Roles Management -->
                <li class="nav-item {{ Route::is('admin.roles.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('admin.roles.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-shield text-info"></i>
                        <p>
                            Roles
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.create') }}" class="nav-link {{ Route::is('admin.roles.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="nav-link {{ Route::is('admin.roles.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Role List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Permissions Management -->
                <li class="nav-item {{ Route::is('admin.permissions.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('admin.permissions.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-key text-warning"></i>
                        <p>
                            Permissions
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.permissions.create') }}" class="nav-link {{ Route::is('admin.permissions.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Permission</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.permissions.index') }}" class="nav-link {{ Route::is('admin.permissions.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permission List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Users Management -->
                <li class="nav-item {{ Route::is('admin.users.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('admin.users.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users text-success"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.create') }}" class="nav-link {{ Route::is('admin.users.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ Route::is('admin.users.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header text-uppercase text-xs text-muted font-weight-bold">WEBSITE CUSTOMIZATION</li>

                <!-- Skills -->
                <li class="nav-item {{ Route::is('skill.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('skill.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-award text-purple"></i>
                        <p>
                            Skills
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('skill.create') }}" class="nav-link {{ Route::is('skill.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Skill</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('skill.index') }}" class="nav-link {{ Route::is('skill.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Skill List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Menus -->
                <li class="nav-item {{ Route::is('admin.menus.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('admin.menus.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-bars text-indigo"></i>
                        <p>
                            Menus
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.menus.create') }}" class="nav-link {{ Route::is('admin.menus.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.menus.index') }}" class="nav-link {{ Route::is('admin.menus.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Menu List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Sliders -->
                <li class="nav-item {{ Route::is('admin.sliders.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('admin.sliders.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-images text-pink"></i>
                        <p>
                            Sliders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.sliders.create') }}" class="nav-link {{ Route::is('admin.sliders.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.sliders.index') }}" class="nav-link {{ Route::is('admin.sliders.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slider List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Policies -->
                <li class="nav-item {{ Route::is('admin.policies.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('admin.policies.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-contract text-teal"></i>
                        <p>
                            Policies
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.policies.create') }}" class="nav-link {{ Route::is('admin.policies.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Policy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.policies.index') }}" class="nav-link {{ Route::is('admin.policies.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Policy List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header text-uppercase text-xs text-muted font-weight-bold">PRODUCT MANAGEMENT</li>

                <!-- Categories -->
                <li class="nav-item {{ Route::is('admin.categories.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('admin.categories.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-list text-primary"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.create') }}" class="nav-link {{ Route::is('admin.categories.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.categories.index') }}" class="nav-link {{ Route::is('admin.categories.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Sub Categories -->
                <li class="nav-item {{ Route::is('admin.sub-categories.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('admin.sub-categories.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-layer-group text-secondary"></i>
                        <p>
                            Sub Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.sub-categories.create') }}" class="nav-link {{ Route::is('admin.sub-categories.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Sub Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.sub-categories.index') }}" class="nav-link {{ Route::is('admin.sub-categories.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Category List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Brands -->
                <li class="nav-item {{ Route::is('admin.brands.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('admin.brands.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags text-cyan"></i>
                        <p>
                            Brands
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.brands.create') }}" class="nav-link {{ Route::is('admin.brands.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Brand</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.brands.index') }}" class="nav-link {{ Route::is('admin.brands.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Brand List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Products -->
                <li class="nav-item {{ Route::is('admin.products.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('admin.products.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-box-open text-orange"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.products.create') }}" class="nav-link {{ Route::is('admin.products.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.products.index') }}" class="nav-link {{ Route::is('admin.products.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Settings -->
                <li class="nav-item {{ Route::is('admin.settings.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Route::is('admin.settings.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs text-danger"></i>
                        <p>
                            Settings
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- General Settings -->
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.general') }}" class="nav-link {{ Route::is('admin.settings.general') ? 'active' : '' }}">
                                <i class="fas fa-cog nav-icon"></i>
                                <p>General Settings</p>
                            </a>
                        </li>

                        <!-- Social Settings -->
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.social') }}" class="nav-link {{ Route::is('admin.settings.social') ? 'active' : '' }}">
                                <i class="fas fa-share-alt nav-icon"></i>
                                <p>Social Settings</p>
                            </a>
                        </li>

                        <!-- Mail Settings -->
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.mail') }}" class="nav-link {{ Route::is('admin.settings.mail') ? 'active' : '' }}">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p>Mail Settings</p>
                            </a>
                        </li>

                        <!-- Integration Settings -->
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.integration') }}" class="nav-link {{ Route::is('admin.settings.integration') ? 'active' : '' }}">
                                <i class="fas fa-plug nav-icon"></i>
                                <p>Integration Settings</p>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>