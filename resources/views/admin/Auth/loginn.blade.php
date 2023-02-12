<script>
    window.alert("Chức năng này chỉ dành cho Admin!!");
    </script>
@extends('client.back.master')
@section('content')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                
            </div>
            <div class="col-sm-4">
                <div class="login-form"><!--login form-->
                    <h2>Đăng Nhập cho Admin</h2>
                    <form action="{{ route('checklogin') }}" method="post">
                        @csrf
                        {{-- <input type="username" placeholder="Tên đăng nhập">
                        <input type="password" placeholder="Mật Khẩu"> --}}
                        <input name="username" type="text" placeholder="Username"/>
                        <input name="password" type="password" placeholder="Password"/>
                        <span style='color:red'>
                            @include('errors.note')
                        </span>
                        <button type="submit" class="btn btn-default">Đăng Nhập</button>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                
            </div>
        </div>
    </div>
</section>
@endsection