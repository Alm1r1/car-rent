<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- head - start -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- shortcut icon -->
    <link rel="shortcut icon" href="{{url('/img/icon.png')}}" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/bootstrap.min.css') }}" />
    <!-- Theme Reset CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/reset.css') }}" />
    <!-- Main Style CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/responsive.css') }}" />
    <!-- head - end -->
    <title>{{ config('app.name', 'Laravel') }}</title>

</head>

<body class="loader-active">

    @include('includes.header')

    @yield('body')

    @include('includes.footer')

    @include('includes.script')

</body>
</html>
