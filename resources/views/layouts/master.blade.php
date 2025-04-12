<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! SEO::generate() !!}
    <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('web/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
    @stack('styles')
</head>

<body>
    @yield('content')

    <script src="{{ asset('web/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('web/js/apexcharts.js') }}"></script>
    <script src="{{ asset('web/js/toastr.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery.inputmask.min.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "timeOut": "3000"
        };
    </script>
    @stack('scripts')
</body>

</html>
