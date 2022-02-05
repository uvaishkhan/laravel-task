<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Event Management</title>
    <!-- Ajax -->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <script src="{{ asset('/assets/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap CSS -->    
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Tostr --> 
    <link rel="stylesheet" href="{{ asset('assets/toastr/build/toastr.min.css') }}">
    <script src="{{ asset('assets/toastr/build/toastr.min.js') }}"></script>
</head>
<body>
@include('elements.header')
@include('elements.flash')
<script>
    $(document).ready(function () {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    });

    function success(message) {
        toastr.success(message);
    }

    function error(message) {
        toastr.error(message);
    }
</script>
@yield('content')

@include('elements.footer')

<!-- Optional JavaScript -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
@stack('scripts')
</body>
</html>
