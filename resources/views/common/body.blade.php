<div id="page-body" class="container">
    <div class="card">

        <form
            novalidate
            id="abuseReport"
            class="needs-validation">
            {{--@csrf--}}

            <div class="card-header">
                <h4 class="m-0 py-2">Report Abuse</h4>
            </div>

            <div class="card-body">


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
</div>

@section('custom-js')
    <script src="/js/common/bootstrap-form-validator.js"></script>
    <script src="/js/abuse-report/create.js"></script>
@endsection
