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
                    Thông tin về Danh Mục:
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
                <table class="table table-striped">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th width="30%">Category Name</th>
                        {{-- <th>Số lượng sản phẩm</th> --}}
                        <th>Tùy chọn</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($result as $category)
                    <tr>
                      <td>{{ $category->cate_id }}</td>
                      <td>{{ $category->cate_name }}</td>
                      {{-- <td>{{ $category->soluong }}</td> --}}
                      <td>
                        <a href="{{ route('admincategory.edit',$category->cate_id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form class="d-inline-block" action="{{ route('admincategory.destroy',$category->cate_id) }}" method="post">
                             @csrf
                             @method('DELETE')
                             <input type="submit" value="Xoá" class="btn btn-danger btn-sm">
                        </form>
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
                    {{ $result->links() }}
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      
    <!-- ./wrapper -->
@endsection