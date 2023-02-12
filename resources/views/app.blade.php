<!DOCTYPE html>
<html lang="en">
<body class="hold-transition register-page">
  @include('container.head')
<div class="register-box">
  <div class="register-logo">
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg" style="font-size: 20px;">@yield('title', $title)</p>
      @yield('content_1')
    </div>
  </div>
</div>
@include('container.footer')
</body>
</html>
