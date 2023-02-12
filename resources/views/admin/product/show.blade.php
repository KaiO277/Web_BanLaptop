@extends('admin.back.master')
@section('content')
    <div class="container-fluid">
        <section class="content-wrapper">
            <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0 text-center">Chi tiết sản phẩm</h5>
                </div>
                <div class="card-body"> 
                  <span><b>Id sản phẩm:</b> {{ $product->prod_id }}</span> <br>
                  <span><b>Tên sản phẩm:</b> {{ $product->prod_name }}</span><br>
                  <span><b>Mô tả sản phẩm:</b> {{ $product->mota }}</span><br>
                  <span><b>Giá sản phẩm:</b> {{ $product->prod_price }}</span><br>
                  <span><b>Số lượng sản phẩm:</b> {{ $product->soluong }}</span><br>
                  <span><b>Card:</b> {{ $info->Card }}</span><br>
                  <span><b>CPU:</b> {{ $info->CPU }}</span><br>
                  <span><b>Ram: </b>{{ $info->Ram }}</span><br>
                  <span><b>Ổ Cứng:</b> {{ $info->O_Cung }}</span><br>
                  <span><b>Pin:</b> {{ $info->Pin }}</span><br>
                  <span><b>Trọng lượng:</b> {{ $info->Trong_luong }}</span><br>
                  <span><b>Kích thước:</b> {{ $info->kichthuoc }}</span><br>
                </div>
                <a href="{{ route('adminproduct.index') }}" class="btn badge-success">Home</a>
              </div>
        </section>
    </div>
    
@endsection