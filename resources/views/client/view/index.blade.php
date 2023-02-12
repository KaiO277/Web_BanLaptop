@extends('client.back.master')
@section('content')
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>N</span>-SHOP Laptop</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('public/images/bg3.webp') }}" class="girl img-responsive" alt="" />
                                {{-- <img src="images/home/pricing.png"  class="pricing" alt="" /> --}}
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>N</span>-SHOP Laptop</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('public/images/bg5.jpg') }}" class="girl img-responsive" alt="" />
                                {{-- <img src="images/home/pricing.png"  class="pricing" alt="" /> --}}
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>N</span>-SHOP Laptop</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('public/images/bg4.png') }}" class="girl img-responsive" alt="" />
                                {{-- <img src="images/home/pricing.png" class="pricing" alt="" /> --}}
                            </div>
                        </div>
                        
                    </div>
                    
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section><!--/slider-->
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
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center">Sản Phẩm: </h2>
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
                                            {{-- <span>{{ $product->prod_price }} VNĐ</span> --}}
                                            {{-- <label>Quantity:</label>
                                            <input type="text" value="3"> --}}
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
            
            <!--/category-tab-->
            
            {{-- <div class="recommended_items"><!--recommended_items-->
                <h2 class="title text-center">Các Sản Phẩm nổi bật</h2>
            
                <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item next left">
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{url('public/uploads')}}/asus.png" alt="">
                                            <h2>10</h2>
                                            <p>Asus</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>	
                            @foreach ($result as $temp)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{url('public/uploads')}}/{{ $temp->prod_img }}" alt="">
                                            <h2>{{ $temp->prod_price }}</h2>
                                            <p>{{ $temp->prod_name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{url('public/uploads')}}/asus.png" alt="">
                                            <h2>10</h2>
                                            <p>Asus</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                     <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                      </a>
                      <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                      </a>			
                </div>
            </div><!--/recommended_items--> --}}
            
        </div>
    </div>
</div>
@endsection