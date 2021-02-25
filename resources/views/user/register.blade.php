@extends('layouts.page-single')

@section('page-name')@endsection

@section('breadcrumbs')@endsection

@section('content')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>

                        <form id="registration" class="user needs-validation" novalidate>

                            <!-- Notification -->
                            <div id="notification" class="d-flex flex-row"></div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="firstname" class="form-control form-control-user"
                                           type="text" name="firstname"
                                           placeholder="{{ __('First Name') }}" required autofocus>
                                </div>
                                <div class="col-sm-6">
                                    <input id="lastname" class="form-control form-control-user"
                                           type="text" name="lastname"
                                           placeholder="{{ __('Last Name') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="username" class="form-control form-control-user"
                                       type="text" name="username"
                                       placeholder="{{ __('Username') }}" required>
                            </div>
                            <div class="form-group">
                                <input id="email" class="form-control form-control-user"
                                       type="text" name="email"
                                       placeholder="{{ __('Email Address') }}" required>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input id="password"  class="form-control form-control-user"
                                           type="password" name="password"
                                           placeholder="{{ __('Password') }}" required>
                                </div>
                                <div class="col-sm-6">
                                    <input id="passwordConfirmation"  class="form-control form-control-user"
                                           type="password" name="passwordConfirmation"
                                           placeholder="{{ __('Confirm Password') }}">
                                </div>
                            </div>
                            <button id="register" type="button" class="btn btn-primary btn-user btn-block">
                                {{ __('Register') }}
                            </button>
                            <hr>
                            <a href="#" class="btn btn-google btn-user btn-block">
                                <i class="fab fa-google fa-fw"></i>&nbsp;{{ __('Register with Google') }}
                            </a>
                            <a href="#" class="btn btn-facebook btn-user btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i>&nbsp;{{ __('Register with Facebook') }}
                            </a>
                        </form>

                        <hr>
                        <div class="text-center">
                            <a class="small" href="#">{{ __('Forgot Password?') }}</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">{{ __('Already have an account? Login!') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-css')

@endsection

@section('custom-js')
<script type="text/javascript" src="/js/user/register.js"></script>
@endsection
