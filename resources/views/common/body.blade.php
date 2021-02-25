<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Page Content -->
    <div id="content">

        @include("common.header")

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            @yield("heading")
        </div>

        <!-- Main Content -->
        @yield("content")

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    @include("common.footer")

</div>
<!-- End of Content Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Page Modal Placeholder -->
<div id="pageModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="pageModal" aria-hidden="true">
    @yield("modal")
</div>
