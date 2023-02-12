@extends('admin.back.master')
@section('content')
<div class="content-wrapper" style="min-height: 1345.6px;">
  <section class="content">
      <div class="container-fluid">
        <br>
          <div class="row">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>{{ $product }}</h3>
                    <p>Sản Phẩm</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="{{ route('adminproduct.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3><i class="fa fa-bar-chart"></i><sup style="font-size: 20px"></sup></h3>
    
                    <p>Biểu Đồ Thống Kê</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="{{ route('adminchart.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3>{{ $cate }}</h3>
                    <p>Danh Mục sản Phẩm</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="{{ route('admincategory.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>{{ $items }}</h3>
                    <p>Hoá đơn đã duyệt</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                  </div>
                  <a href="{{ route('adminorder.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <div class="card bg-gradient-success">
        <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
        <h4>Danh sách hoá đơn chờ duyệt</h4>
        </div>
      </div>
       </div><!-- /.container-fluid -->
    </section>
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
                          <a class="btn btn-info" href="{{ route('adminadmin.show', $cus->cus_id) }}">Xem</a>
                        <form class="d-inline-block" action="{{ route('adminadmin.sendmail', $cus->cus_id) }}" method="post">
                          @csrf
                          <input type="hidden" name="name" value="{{ $cus->cus_name }}">
                          <input type="hidden" name="email" value="{{ $cus->email }}">
                         <input class="btn btn-success" type="submit" value="Duyệt">
                        </form>
                        <form class="d-inline-block" action="{{ route('adminadmin.huyorder', $cus->cus_id) }}" method="post">
                          @csrf
                          <input type="hidden" name="name" value="{{ $cus->cus_name }}">
                          <input type="hidden" name="email" value="{{ $cus->email }}">
                         <input class="btn btn-danger" type="submit" value="Huỷ">
                        </form>
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
   @include('errors.error')
              {{-- ".$error."  --}}
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
{{-- <script>
  window.alert($error);
 </script> --}}
<!-- ./wrapper -->
@endsection