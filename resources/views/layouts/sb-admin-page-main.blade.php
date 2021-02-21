<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Network Abuse Reporting System - a simple web application to keep record of network attack encounters.">
    <meta name="author" content="Noel Palo">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Fav Icon -->
    <link rel=icon href="/plugins/font-awesome/5.15.2/svgs/solid/network-wired.svg">

    <!-- Font-Awesome -->
    <link rel="stylesheet" type="text/css" href="/plugins/font-awesome/5.15.2/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/plugins/bootstrap/4.6.0/dist/css/bootstrap.min.css">
    <!-- SB Admin 2 -->
    <link rel="stylesheet" type="text/css" href="/css/sb-admin-2.min.css">

    <!-- Custom CSS Files -->
{{--    <link rel="stylesheet" type="text/css" href="/css/style.css">--}}
    @yield("custom-css")

</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
@include("sb-admin-templates.common.sidebar")
<!-- End of Sidebar -->

<!-- Page Body -->
@include("sb-admin-templates.common.body")
<!-- End of Page Body -->

</div>
<!-- End of Page Wrapper -->

<!-- JavaScript Files -->
{{--<script type="text/javascript" src="/plugins/jquery/3.5.1/jquery-3.5.1.slim.min.js"></script>--}}
<script type="text/javascript" src="/plugins/jquery/3.5.1/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="/plugins/bootstrap/4.6.0/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/plugins/popper.js/1.16.1/umd/popper.min.js"></script>
<script type="text/javascript" src="/plugins/jquery-easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/js/sb-admin-2.min.js"></script>
<script type="text/javascript" src="/plugins/axios/dist/axios.min.js"></script>

<!-- Custom JavaScript Files -->
<script type="text/javascript" src="/js/common/auto-scale-container.js"></script>
@yield("custom-js")
</body>
</html>
