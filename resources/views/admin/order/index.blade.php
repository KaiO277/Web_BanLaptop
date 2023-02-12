@extends('admin.back.master')
@section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper" style="min-height: 1445.6px;">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                  <!-- Left navbar links -->
                  <ul class="navbar-nav">
                    Thông tin về Hoá Đơn đã duyệt:
                  </ul>
                  <!-- Right navbar links -->
                  <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->
                    <li class="nav-item">
                      <form action="" method="get">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                          <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block" style="display: none;">
                          <form class="form-inline">
                            <div class="input-group input-group-sm">
                              <input class="form-control form-control-navbar" name="key" type="search" placeholder="Nhập tên sản phẩm cần tìm..." aria-label="Search">
                              <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                  <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                  <i class="fas fa-times"></i>
                                </button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </form>
                    </li>
                  </ul>
                </nav>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Khách Hàng</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Tên Khách Hàng</th>
                    <th>Ngày đặt</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cuss as $cus)
                  <tr>
                    <td>{{ $cus->cus_id }}</td>
                    <td>{{ $cus->cus_name }}</td>
                    <td>{{ $cus->OrderTime }}</td>
                    <td>
                      {{ $cus->sdt }}
                    </td>
                    <td>{{ $cus->address }}</td>
                    <td>{{ $cus->email }}</td>
                    <td>
                      <div class="row justify-content-center align-items-center g-2">
                        <div class="col">
                          <a class="btn btn-info" href="{{ route('adminorder.show', $cus->cus_id) }}">Xem</a>
                        {{-- <form class="d-inline-block" action="{{ route('adminadmin.sendmail', $cus->cus_id) }}" method="post">
                          @csrf
                          <input type="hidden" name="name" value="{{ $cus->cus_name }}">
                          <input type="hidden" name="email" value="{{ $cus->email }}">
                         <input class="btn btn-success" type="submit" value="Duyệt">
                        </form> --}}
                        {{-- <form class="d-inline-block" action="{{ route('adminadmin.huyorder', $cus->cus_id) }}" method="post">
                          @csrf
                          <input type="hidden" name="name" value="{{ $cus->cus_name }}">
                          <input type="hidden" name="email" value="{{ $cus->email }}">
                         <input class="btn btn-danger" type="submit" value="Huỷ">
                        </form> --}}
                        </div>
                      </div>
                    </td>
                  </tr>
                  @endforeach                 
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  {{ $cuss->appends(Request::all())->links() }}
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách sản phẩm đặt</h3>

              <div class="card-tools">
                <div class="card-footer clearfix">
                  <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                      {{ $orders->appends(Request::all())->links() }}
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table">
                <thead>
                  <tr>
                    <th>Tên Sản Phẩm</th>
                    <th>Số lượng</th>
                    <th>ID KH</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                  <tr>
                    <td>{{ $order->prod_name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>
                      {{ $order->cus_id }}
                    </td>
                  </tr>
                  @endforeach                  
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
    </div>
  </section>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      
    <!-- ./wrapper -->
@endsection