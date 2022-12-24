<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item {{ Request::is('admin/dashboard') ? 'active':'' }}">
            <a class="nav-link" href="{{url('admin/dashboard')}}">
              <i class="mdi mdi-speedometer menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/orders') ? 'active':'' }}">
            <a class="nav-link" href="{{url('admin/orders')}}">
              <i class="mdi mdi-sale menu-icon"></i>
              <span class="menu-title">Đơn Hàng</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/category*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#category" 
                aria-expanded="{{ Request::is('admin/category*') ? 'true':'false' }}">
              <i class="mdi mdi-view-list menu-icon"></i>
              <span class="menu-title">Danh Mục Sản Phẩm</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/category*') ? 'show':'' }}" id="category">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                  <a class="nav-link {{ Request::is('admin/category/create') ? 'active':'' }}" href="{{url('admin/category/create')}}">Thêm Danh Mục</a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link {{ Request::is('admin/category') || Request::is('admin/category/*/edit') ? 'active':'' }}" href="{{url('admin/category')}}">Quản Lý Danh Mục</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item {{ Request::is('admin/products*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#products" 
                aria-expanded="{{ Request::is('admin/products*') ? 'true':'false' }}">
              <i class="mdi mdi-plus-circle menu-icon"></i>
              <span class="menu-title">Sản Phẩm</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/products*') ? 'show':'' }}" id="products">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                  <a class="nav-link {{ Request::is('admin/products/create') ? 'active':'' }}" href="{{ url('admin/products/create') }}">Thêm Sản Phẩm</a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link {{ Request::is('admin/products') || Request::is('admin/products/*/edit') ? 'active':'' }}" href="{{ url('admin/products') }}">Quản Lý Kho Hàng</a>
                </li>
              </ul>
            </div>
          </li>
         
          <li class="nav-item {{ Request::is('admin/brands') ? 'active':'' }}">
            <a class="nav-link" href="{{url('admin/brands')}}">
              <i class="mdi mdi-reorder-horizontal menu-icon"></i>
              <span class="menu-title">Thương Hiệu</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/colors') ? 'active':'' }}">
            <a class="nav-link" href="{{url('admin/colors')}}">
              <i class="mdi mdi-format-color-fill menu-icon"></i>
              <span class="menu-title">Màu Sắc</span>
            </a>
          </li>

          <li class="nav-item {{ Request::is('admin/users*') ? 'active':'' }}">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-users" 
                aria-expanded="{{ Request::is('admin/users*') ? 'true':'false' }}">
              <i class="mdi mdi-account-multiple-plus menu-icon"></i>
              <span class="menu-title">Người Dùng</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Request::is('admin/users*') ? 'show':'' }}" id="ui-users">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> 
                  <a class="nav-link {{ Request::is('admin/users/create') ? 'active':'' }}" href="{{ url('admin/users/create') }}">Thêm Người Dùng</a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link {{ Request::is('admin/users') || Request::is('admin/users/*/edit') ? 'active':'' }}" href="{{ url('admin/users') }}">Quản Lý Người Dùng</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item {{ Request::is('admin/sliders') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/sliders') }}">
              <i class="mdi mdi-view-carousel menu-icon"></i>
              <span class="menu-title">Ảnh Trang Chủ</span>
            </a>
          </li>
          <li class="nav-item {{ Request::is('admin/settings') ? 'active':'' }}">
            <a class="nav-link" href="{{ url('admin/settings') }}">
              <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">Cài Đặt Trang Web</span>
            </a>
          </li>
        </ul>
      </nav>