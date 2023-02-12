<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('public/images/laptop.jpg') }}">
    <title>Shop</title>
    @include('client.back.css')
</head>
<body>
    @include('client.back.header')
    @yield('content')
    @include('client.back.footer')
    @include('client.back.js')
</body>
</html>