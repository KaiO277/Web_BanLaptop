<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div><div class="sidebar-search-results"><div class="list-group"><a href="#" class="list-group-item"><div class="search-title"><strong class="text-light"></strong>N<strong class="text-light"></strong>o<strong class="text-light"></strong> <strong class="text-light"></strong>e<strong class="text-light"></strong>l<strong class="text-light"></strong>e<strong class="text-light"></strong>m<strong class="text-light"></strong>e<strong class="text-light"></strong>n<strong class="text-light"></strong>t<strong class="text-light"></strong> <strong class="text-light"></strong>f<strong class="text-light"></strong>o<strong class="text-light"></strong>u<strong class="text-light"></strong>n<strong class="text-light"></strong>d<strong class="text-light"></strong>!<strong class="text-light"></strong></div><div class="search-path"></div></a></div></div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <li class="nav-item">
                <a href="{{ route('adminadmin.home') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Trang Chủ
                </p>
                </a>
            </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Bảng
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('adminproduct.index') }}" class="nav-link">
                  <i class="material-icons"style="font-size:15px" >radio_button_checked</i>
                <p>Sản Phẩm</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admincategory.index') }}" class="nav-link">
                  <i class="material-icons"style="font-size:15px" >radio_button_checked</i>
                <p>Danh Mục Sản Phẩm</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('adminorder.index') }}" class="nav-link">
                  <i class="material-icons"style="font-size:15px" >radio_button_checked</i>
                <p>Hoá đơn đã duyệt</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Chỉnh Sửa 
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sửa thông tin Sản Phẩm</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sửa thông tin Danh Mục</p>
              </a>
            </li>
          </ul>
        </li>  
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
              Thêm
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="{{ route('adminproduct.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm Sản Phẩm</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admincategory.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm Danh Mục</p>
              </a>
            </li>
          </ul>
        </li> 
        <li class="nav-item">
          <a href="" class="nav-link">
              <i class="fa fa-bar-chart"></i>
            <p>
              Biểu đồ thống kê
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
              <a href="{{ route('adminchart.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thống kê Doanh Thu</p>
              </a>
            </li>
            <li class="nav-item">
              {{-- <a href="{{ route('admincategory.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thêm Danh Mục</p>
              </a>
            </li> --}}
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link">
            <i style="font-size:24px" class="fa">&#xf08b;</i>
            <p>
              Đăng Xuất
            </p>
          </a>
        </li>                                              
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>