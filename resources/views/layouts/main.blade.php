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
    <link rel=icon href=https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.14/svgs/solid/network-wired.svg>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/plugins/bootstrap/4.6.0/dist/css/bootstrap.min.css">
    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- Custom CSS Files -->
    <link href="/css/style.css" rel="stylesheet">

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

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--<script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.0/js/vendor/jquery-slim.min.js"><\/script>')</script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
{{--<script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>--}}

<!-- Bootstrap core JavaScript -->
<script src="/plugins/jquery/3.5.1/jquery-3.5.1.slim.min.js"></script>
<script>window.jQuery || document.write('<script src="https://getbootstrap.com/docs/4.0/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="/plugins/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="/plugins/bootstrap/4.6.0/dist/js/bootstrap.min.js"></script>
<script src="/plugins/axios/dist/axios.min.js"></script>

<!-- Custom JavaScript Files -->
<script src="/js/common/auto-scale-container.js"></script>
@yield('custom-js')

</body>
</html>
