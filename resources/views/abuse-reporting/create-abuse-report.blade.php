@extends('layouts.main')

@section('page-name') Reporting @endsection

@section('breadcrumbs')

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Abuse</a></li>
        <li class="breadcrumb-item active">Report</li>
    </ol>

@endsection

@section('content')

<div class="card">
    <form
        novalidate
        id="abuseReport"
        class="needs-validation">

        <div class="card-header">
            <h4 class="m-0 py-2">Report Abuse</h4>
        </div>

        <!-- Notification -->
        <div id="notification" class="d-flex flex-row"></div>

        <div class="card-body my-2">

            <div class="form-group">
                <label for="reportIpAddress">IP Address:</label>
                <input type="text" class="form-control" id="ipAddress" name="ipAddress" placeholder="IP Address" required>
                <div class="invalid-feedback">This field is required!</div>
                <small id="reportIpAddressHelpBlock" class="form-text text-muted">
                    Enter the IP Address value (IPV4/IPV6)
                </small>
            </div>

            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" id="reportComments" name="comment" rows="5"></textarea>
            </div>

        </div>

        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-primary ">Submit Report</button>
            </div>
        </div>

    </form>
</div>
@endsection

@section('custom-css')

@endsection

@section('custom-js')
{{--    <script type="text/javascript" src="/js/common/bootstrap-form-validator.js"></script>--}}
    <script type="text/javascript" src="/js/abuse-report/create.js"></script>
@endsection
