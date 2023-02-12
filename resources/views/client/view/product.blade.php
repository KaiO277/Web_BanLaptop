@extends('client.back.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh Mục</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach ($categories as $category)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="#">{{ $category->cate_name }}</a></h4>
                            </div>
                        </div>
                        @endforeach
                        
                    </div><!--/category-products-->
                
                    <!--/brands_products-->
                    
                    <!--/price-range-->
                    
                    <!--/shipping-->
                
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                          <li><a href="{{ route('clienthome.index') }}">Home</a></li>
                          <li><a href="{{ route('clientproduct.index') }}">Sản Phẩm</a></li>
                          <li class="active">{{ $result->prod_name }}</li>
                        </ol>
                    </div>
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="{{url('public/uploads')}}/{{ $result->prod_img }}" style="width=40px" alt="">
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="" class="newarrival" alt="">
                            <h2>{{ $result->prod_name }}</h2>
                            <p>{{ $result->mota }}</p>
                            @php
                                        if($result->soluong>0){
                                            echo '<label>Trình trạng: <b>Còn hàng</b></label>';
                                        }else {
                                            echo '<label>Trình trạng: <b>Hết hàng</b></label>';
                                        }
                                    @endphp
                            <img src="images/result-details/rating.png" alt="">
                            <form action="{{ route('clientcart.add', $result->prod_id) }}" method="get">
                                @csrf
                                <span>
                                    <span>{{ number_format($result->prod_price) }} VNĐ</span>
                                    <input type="hidden" name="prodID_hidden" value="{{ $result->prod_id }}">
                                    <button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Thêm vào giỏ
                                    </button>
                                </span>
                            </form>
                            
                            <h3>Thông số kĩ thuật:</h3>
                            <p><b>Loại card đồ họa:</b> {{ $result->Card }}</p>
                            <p><b>Loại CPU:</b> {{ $result->CPU }}</p>
                            <p><b>Ram:</b>{{ $result->Ram }} </p>
                            <p><b>Ổ Cứng:</b>{{ $result->O_Cung }} </p>
                            <p><b>Pin:</b>{{ $result->Pin }} </p>
                            <p><b>Trọng lượng:</b>{{ $result->Trong_luong }} </p>
                            <p><b>Kích thước:</b>{{ $result->kichthuoc }} </p>
                            <a href=""><img src="images/result-details/share.png" class="share img-responsive" alt=""></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                
                <!--/category-tab-->
                
                <!--/recommended_items-->
                
            </div>
        </div>
    </div>

@endsection