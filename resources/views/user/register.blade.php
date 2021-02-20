
@extends('layouts.main')

@section('page-name')@endsection

@section('breadcrumbs')@endsection

@section('content')
<div class="card">
    <form
        novalidate
        id="registration"
        class="needs-validation">

        <div class="card-header">
            <h4 class="m-0 py-2">User Registration</h4>
        </div>

        <!-- Notification -->
        <div id="notification" class="d-flex flex-row"></div>

        <div class="card-body my-2">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname">First name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname">
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname">Last name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname">
                </div>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
            </div>

        </div>

        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary ">Sign Up</button>
            </div>
        </div>

    </form>
</div>
@endsection

@section('custom-css')

@endsection

@section('custom-js')
<script type="text/javascript" src="/js/user/register.js"></script>
@endsection
