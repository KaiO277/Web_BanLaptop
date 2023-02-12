@extends('client.back.master')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Danh Mục</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        @foreach ($categories as $category)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title"><a href="{{ route('clientproduct.show',$category->cate_id) }}">{{ $category->cate_name }}</a></h4>
                            </div>
                        </div>
                        @endforeach
                        
                    </div><!--/category-productsr-->
                
                    <!--/brands_products-->
                    
                    <!--/price-range-->
                    
                    <!--/shipping-->
                    
                </div>
            </div>
            
            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <div class="breadcrumbs">
                        <ol class="breadcrumb">
                          <li><a href="{{ route('clienthome.index') }}">Home</a></li>
                          <li class="active">Sản Phẩm</li>
                        </ol>
                    </div>
                    <h2 class="title text-center">
                        Danh Sách Laptop
                    </h2>
                    @foreach ($products as $product)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{url('public/uploads')}}/{{ $product->prod_img }}" alt="">
                                    <h2>{{ number_format($product->prod_price) }}VNĐ</h2>
                                    <p>{{ $product->prod_name }}</p>
                                    {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{ $product->prod_price }}VNĐ</h2>
                                        <p>{{ $product->prod_name }}</p>
                                        <a href="{{ route('clienthome.show',$product->prod_id) }}" class="btn btn-default add-to-cart">Xem thêm</a>
                                    </div>
                                </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified">
                                {{-- <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li> --}}
                                <li>
                                    <form action="{{ route('clientcart.add', $product->prod_id) }}" method="get">
                                        @csrf
                                        <span>
                                            <input type="hidden" name="prodID_hidden" value="{{ $product->prod_id }}">
                                            <button type="submit" class="btn btn-fefault cart form-control">
                                                <i class="fa fa-shopping-cart"></i>
                                                Thêm vào giỏ
                                            </button>
                                        </span>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                   
                
                </div><!--features_items-->
                <ul class="pagination">
                    <div class="card-footer clearfix">
                        <div class="card-footer clearfix">
                          <ul class="pagination pagination-sm m-0 float-right">
                            {{ $products->links() }}
                          </ul>
                        </div>
                      </div>
                </ul> 
            </div>
        </div>
    </div>
</section>
@endsection