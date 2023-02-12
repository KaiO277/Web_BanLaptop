<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('public/images/laptop.jpg') }}">
    <title>Admin</title>
    @include('admin\back\Css')
    
</head>
<body class="wrapper sidebar-collapse">
    @include('admin.back.header')
    @include('admin.back.left')
    @yield('content')
    @include('admin.back.footer')
    @include('admin.back.Js')
</body>
</html>