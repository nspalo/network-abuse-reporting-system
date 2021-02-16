
@extends('layouts.main')

@section('page-name')@endsection

@section('breadcrumbs')@endsection

@section('content')

    <div class="card">
        <form
            novalidate
            id="abuseReport"
            class="needs-validation">

            <div class="card-header">
                <h4 class="m-0 py-2">User Registration</h4>
            </div>

            <!-- Notification -->
            <div id="notification" class="d-flex flex-row"></div>

            <div class="card-body my-2">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">First name</label>
                        <input type="text" class="form-control" id="inputEmail4" name="firstname">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Last name</label>
                        <input type="text" class="form-control" id="inputPassword4" name="lastname">
                    </div>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Email</label>
                    <input type="email" class="form-control" id="formGroupExampleInput" name="email">
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Username</label>
                        <input type="text" class="form-control" id="inputEmail4" name="username">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" name="password">
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
{{-- <script type="text/javascript" src="/js/namehere.js"></script> --}}
@endsection
