@extends('admin.back.master')
@section('content')
<div class="content-wrapper" style="min-height: 1345.6px;">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Điền thông tin Danh Mục cần thêm</h3>
                </div>
                {{-- @include('errors.note') --}}
                <div class="card-body">
                    <form action="{{ route('admincategory.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div  class="mb-3 mt-3">
                          <label  for="IntroCar">Tên Danh Mục:</label>
                          <input type="text"  class="form-control" placeholder='Nhập tên Danh Mục' name="txtTenDM">
                        </div>
                        <span>
                          @include('errors.note')
                        </span>                        
                        <button type="submit" class="btn btn-primary">Tạo</button>
                      </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>        
    <!-- Main content -->
    
    <!-- /.content -->
  </div>
 
@endsection