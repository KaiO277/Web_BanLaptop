@extends('client.back.master')
@section('content')
<form action="" method="get">
    @csrf  
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{ route('clienthome.index') }}">Home</a></li>
              <li class="active">Giỏ hàng</li>
            </ol>
        </div>
       
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Ảnh</td>
                        <td class="description">Tên Sản Phẩm</td>
                        {{-- <td>Cập Nhật</td> --}}
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart->items as $v_content)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{url('public/uploads')}}/{{ $v_content['image'] }}" width="70" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <p>{{ $v_content['name'] }}</p> 							
                        </td>
                        <td class="cart_price">
                            <p>{{ number_format($v_content['price']).' '.'vnđ' }}</p>
                        </td>                        
                        <form action="" method="get"></form>
                        <td class="cart_quantity"> 
                            <div class="cart_quantity_button">
                                <form action="{{ route('clientcart.update',$v_content['id']) }}" method="get">
                                    @csrf
                                    <input class="cart_quantity_input" type="number"  style="width:50px" name="quantity" value="{{ $v_content['quantity'] }}">
                                    <button class="btn btn-success btn-sm" type="submit">Update</button>
                                </form>
                                @include('errors.error')
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">
                                @php
                                    $sum = $v_content['price'] * $v_content['quantity'];
                                    echo number_format($sum);
                                @endphp
                            </p>
                        </td>
                        <td class="cart_delete">
                                <a href="{{ route('clientcart.remove',$v_content['id']) }}" class="cart_quantity_delete"><i class="fa fa-times"></i></a>                    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h2>Điền thông tin và xác nhận lại đơn hàng</h2>
        </div>
        @include('errors.note')
        <div class="row">
            <div class="col-sm">
                <div class="total_area">                                    
                    <form action="{{ route('clientorder') }}" method="get">
                        @csrf
                        <ul>
                            <input type="text" name="name" id="name" placeholder="Nhập tên" class="form-control" value="{{ old('name') }}">
                            <input type="text" name="sdt" id="sdt" placeholder="Nhập Số điện thoại" class="form-control" value="{{ old('sdt') }}">
                            <input type="text" name="address" id="address" placeholder="Nhập địa chỉ" class="form-control" value="{{ old('address') }}">
                            <input type="email" name="email" id="email" placeholder="Nhập email" class="form-control" value="{{ old('email') }}">                           
                            <li>
                                Tổng tiền 
                                <span>
                                    @php
                                    echo number_format($cart->total_price).' '.'vnđ';
                                    @endphp
                                </span>
                            </li>
                            <li>Thuế <span>0</span></li>
                            <li>Phí vận chuyển <span>Free</span></li>
                            <li>Thành tiền 
                                <span>
                                    @php
                                    echo number_format($cart->total_price).' '.'vnđ';
                                    @endphp
                                    {{-- {{ $cart->total_price }} --}}
                                </span>
                            </li>
                        </ul>                        
                            {{-- @include('errors.note')                                                     --}}
                        <button class="btn-default button--submit check_out" type="submit" href="">xác nhận</button>
                    </form>                        
                </div>
            </div>
        </div>
    </div>
</section>
</form>
@endsection