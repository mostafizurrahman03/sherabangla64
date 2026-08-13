<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link">
    <img src="{{ asset('admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Asif Hossain</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('admin') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">MD Asif</a>
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
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>




      <li class="nav-header">ADMIN MANAGEMENT</li>

        <!-- Roles Management -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-shield"></i>
            <p>
              Roles
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.roles.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Role</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.roles.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Role List</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Permissions Management -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-key"></i>
            <p>
              Permissions
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.permissions.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Permission</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.permissions.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Permission List</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Users Management -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Users
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.users.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.users.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">WEBSITE CUSTOMIZATION</li>

        <!-- Menus -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-bars"></i>
            <p>
              Menus
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.menus.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Menu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.menus.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Menu List</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Sliders -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-images"></i>
            <p>
              Sliders
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.sliders.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Slider</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.sliders.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Slider List</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Policies -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-contract"></i>
            <p>
              Policies
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.policies.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Policy</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.policies.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Policy List</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-header">PRODUCT MANAGEMENT</li>

        <!-- Categories -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-list"></i>
            <p>
              Categories
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.categories.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.categories.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Category List</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Sub Categories -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-layer-group"></i>
            <p>
              Sub Categories
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.sub-categories.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Sub Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.sub-categories.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sub Category List</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Brands -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tags"></i>
            <p>
              Brands
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.brands.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Brand</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.brands.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Brand List</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Products -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-box-open"></i>
            <p>
              Products
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.products.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Product</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.products.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Product List</p>
              </a>
            </li>
          </ul>
        </li>

        {{--<li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i> 
            <p>
              Headers
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('header.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Update Header</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Mini Feature
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('mini_feature.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Feature List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('mini_feature.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New Feature </p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Features
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('features.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Features List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('features.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New Feature </p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Install
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('installs.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Install List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('installs.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add New Install </p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Video
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('videos.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Update Video</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Testtimonial
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('testimonial.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Testtimonial</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('testimonial.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add new Testtimonial </p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Products
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('product.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All Products</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('product.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add new Product </p>
              </a>
            </li>
          </ul>
        </li>

        @php
        $pending = App\Models\Order::where('status', '=', 'pending')->count();
        @endphp

        <li class="nav-item">
          <a href="{{ route('settings.edit') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Orders
              <span class="right badge badge-success">{{ $pending }}</span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              FAQ
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('faq.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>All FAQ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('faq.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add new FAQ </p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="{{ route('settings.edit') }}" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Site Settings
            </p>
          </a>
        </li>--}}

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>