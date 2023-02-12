@if ($errors->any())
 
  @foreach ($errors->all() as $error)
 {
    <script>
        window.alert($error);
    </script>
    {{-- <div class="alert alert-danger">
        <ul style="list-style: none;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> --}}
} @endforeach
 
@endif

@if(Session::has('error'))
    {{-- <div class="alert alert-danger">
        {{Session::get('error')}}
    </div> --}}
    {{-- echo " --}}
    <script type='text/javascript'>alert('{{Session::get('error')}}');</script>
    {{-- "; --}}
    {{-- <script>
        window.alert({{Session::get('error')}});
    </script> --}}
@endif

@if(Session::has('success'))
    {{-- <div class="alert alert-success">
        {{Session::get('success')}}
    </div> --}}
    {{-- <script>
        window.alert({{Session::get('success')}});
    </script> --}}
    <script type='text/javascript'>alert('{{Session::get('success')}}');</script>
@endif