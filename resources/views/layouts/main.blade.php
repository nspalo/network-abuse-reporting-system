<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Network Abuse Reporting System - a simple web application to keep record of network attack encounters.">
    <meta name="author" content="Noel Palo">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fav Icon -->
    <link rel=icon href="/plugins/font-awesome/5.15.2/svgs/solid/network-wired.svg">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="/plugins/bootstrap/4.6.0/dist/css/bootstrap.min.css">
    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="/plugins/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="/plugins/alertifyjs/css/alertify.min.css" />

    <!-- Custom CSS Files -->
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    @yield('custom-css')
</head>

<body>

<!-- Page Header -->
@include( "common.header" )
<!-- Page Header -->

<!-- Page Body -->
@include( "common.body" )
<!-- Page Body -->

<!-- Page Footer -->
@include( "common.footer" )
<!-- Page Footer -->

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/plugins/jquery/3.5.1/jquery-3.5.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script type="text/javascript" src="https://getbootstrap.com/docs/4.0/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script type="text/javascript" src="/plugins/popper.js/1.16.1/umd/popper.min.js"></script>
<script type="text/javascript" src="/plugins/bootstrap/4.6.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/plugins/alertifyjs/alertify.min.js"></script>
<script type="text/javascript" src="/plugins/axios/dist/axios.min.js"></script>


<!-- Custom JavaScript Files -->
<script type="text/javascript" src="/js/common/auto-scale-container.js"></script>
@yield('custom-js')

</body>
</html>
