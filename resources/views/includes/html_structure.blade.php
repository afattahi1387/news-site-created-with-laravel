<!DOCTYPE html>
<html dir="rtl" lang="fa">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@section('title'){{ env('APP_NAME') }}@show</title>
        <!-- Favicon-->
        <link rel="icon" href="{{ asset('images/icons/' . env('APP_ICON')) }}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <style>
            .footer-a {
                text-decoration: none;
                color: red;
            }

            .footer-a:hover {
                color: blue;
            }
        </style>
    </head>
    <body>
        @include('includes.header')
        @yield('content')
        @include('includes.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
