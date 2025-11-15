 <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
            Copyright © {{ date('Y') }} <a href="{{route('home')}}" target="_blank">
                Unique Radiance Realtors Group.</a> All rights reserved.
        </span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> <i class="ti-heart text-danger ms-1"></i></span>
    </div>
</footer>

 <!-- plugins:js -->
<script src="{{ asset('assets/admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page --> 
<script src="{{ asset('assets/admin/assets/vendors/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('assets/admin/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
<script src="{{ asset('assets/admin/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/admin/assets/js/dataTables.select.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('assets/admin/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/admin/assets/js/template.js') }}"></script>
<script src="{{ asset('assets/admin/assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/admin/assets/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('assets/admin/assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/assets/js/dashboard.js') }}"></script>
<!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
<!-- End custom js for this page-->