<script src="{{ asset('public/js/admin/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('public/js/admin/bootstrap.bundle.min.js') }}"></script>
        <!-- bs-custom-file-input -->
        <script src="{{ asset('public/js/admin/bs-custom-file-input.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('public/js/admin/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        {{-- <script src="{{ asset('public/js/admin/demo.js') }}"></script> --}}
        <!-- Page specific script -->
        <script>
        $(function () {
        bsCustomFileInput.init();
        });
        </script>