@extends('admin.back.master')
@section('content')
<div class="content-wrapper" style="min-height: 1345.6px;">
    <!-- Content Header (Page header) -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Điền thông tin Sản Phẩm cần sửa</h3>
                </div>
                @include('errors.note')
                <div class="card-body">
                    <form action="{{ route('adminproduct.update',$product->prod_id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div  class="mb-3 mt-3">
                          <label  for="IntroCar">Tên Sản Phẩm:</label>
                          <input type="text"  class="form-control" placeholder='Nhập tên Sản Phẩm' name="txtTenSP" value="{{ $product->prod_name }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="PriceSale">Giá Sản Phẩm:</label>
                            <input type="text" class="form-control" id="new" placeholder="Nhập giá Phẩm" name="txtGiaSP" value="{{ $product->prod_price }}">
                        </div>
                        <div class="mb-3">
                            <label for="PriceSale">Danh Mục:</label>
                            <select id="danhmuc" name="txtDM">
                                @foreach ($cate as $temp)
                                <option value="{{ $temp->cate_id }}">{{ $temp->cate_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                          <label  for="PriceOld">Mô tả:</label>
                          <input type="text" class="form-control" id="mota" placeholder="Nhập Mô tả" name="txtMota" value="{{ $product->mota }}">
                        </div>
                        <div class="mb-3">
                            <label for="PriceSale">Số Lượng Sản Phẩm:</label>
                            <input type="number" class="form-control" id="new" placeholder="Nhập Số Lượng Sản Phẩm" name="txtSoLuong" value="{{ $product->soluong }}">
                        </div>
                        <div class="mb-3">
                            <label  for="Image">Image:</label>
                            <input type="file" name="txtImage" id="txtImage">
                        </div>
                        <div class="mb-3">
                            <label for="PriceSale">Thông tin về Card:</label>
                            <input type="text" class="form-control" id="new" placeholder="Nhập Thông tin về Card" name="txtCard" value="{{ $info->Card }}">
                        </div>
                        <div class="mb-3">
                            <label for="PriceSale">Thông tin về CPU:</label>
                            <input type="text" class="form-control" id="new" placeholder="Nhập Thông tin về CPU" name="txtCPU" value="{{ $info->CPU }}">
                        </div>
                        <div class="mb-3">
                            <label for="PriceSale">Thông tin về Ram:</label>
                            <input type="text" class="form-control" id="new" placeholder="Nhập Thông tin về Ram" name="txtRam" value="{{ $info->Ram }}">
                        </div>
                        <div class="mb-3">
                            <label for="PriceSale">Thông tin về Ổ Cứng:</label>
                            <input type="text" class="form-control" id="new" placeholder="Nhập Thông tin về Ổ Cứng" name="txtOCung" value="{{ $info->O_Cung }}">
                        </div>
                        <div class="mb-3">
                            <label for="PriceSale">Thông tin về Pin:</label>
                            <input type="text" class="form-control" id="new" placeholder="Nhập Thông tin về Pin" name="txtPin" value="{{ $info->Pin }}">
                        </div>
                        <div class="mb-3">
                            <label for="PriceSale">Thông tin về Trọng lượng:</label>
                            <input type="text" class="form-control" id="new" placeholder="Nhập Thông tin về Trọng lượng" name="txtTrongLuong" value="{{ $info->Trong_luong }}">
                        </div>
                        <div class="mb-3">
                            <label for="PriceSale">Thông tin về Kích Thước:</label>
                            <input type="text" class="form-control" id="new" placeholder="Nhập Thông tin về Kích Thước" name="txtKichThuoc" value="{{ $info->kichthuoc }}">
                        </div>
                        <input type="hidden" name="tenSP" value="{{ $product->prod_name }}">
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