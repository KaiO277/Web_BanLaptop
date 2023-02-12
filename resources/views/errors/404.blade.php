@include('client.back.master')
@section('content')
<div class="container text-center">
    <div class="logo-404">
        <a href="{{ route('clienthome.index') }}"><img src="{{ asset('public/images/laptop.jpg') }}" style='width:15%' alt="" /></a>
    </div>
    <div class="content-404">
        <img src="{{ asset('public/images/404.jpg') }}" class="img-responsive" alt="" />
        <h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
        <p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
        <h2><a href="index.html">Bring me back Home</a></h2>
    </div>
</div>
@endsection