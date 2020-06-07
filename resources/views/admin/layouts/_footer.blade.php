{{-- /.content-wrapper --}}
<footer class="main-footer">
  <strong>CopyLeft &copy; 2018
</footer>

{{-- Control Sidebar --}}
<aside class="control-sidebar control-sidebar-dark">
  {{-- Control sidebar content goes here --}}
</aside>
{{-- /.control-sidebar --}}
</div>
{{-- ./wrapper --}}

{{-- jQuery --}}
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
{{-- jQuery UI 1.11.4 --}}
<script src="{{asset('admin/dist/js/jquery-ui.min.js')}}"></script>
{{-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip --}}
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
{{-- Bootstrap 4 --}}
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
{{-- Morris.js charts --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('admin/dist/js/raphael-min.js')}}"></script>
<script src="{{asset('admin/plugins/morris/morris.min.js')}}"></script>
{{-- Sparkline --}}
<script src="{{asset('admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
{{-- jvectormap --}}
<script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
{{-- jQuery Knob Chart --}}
<script src="{{asset('admin/plugins/knob/jquery.knob.js')}}"></script>
{{-- daterangepicker --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
{{-- datepicker --}}
<script src="{{asset('admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
{{-- Bootstrap WYSIHTML5 --}}
<script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
{{-- Slimscroll --}}
<script src="{{asset('admin/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>

<!-- SweetAlert2 -->
<script src="{{asset('admin/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('admin/plugins/toastr/toastr.min.js')}}"></script>
{{-- FastClick --}}
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
{{-- AdminLTE App --}}
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>
{{-- AdminLTE dashboard demo (This is only for demo purposes) --}}
{{--  <script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script>  --}}
{{-- AdminLTE for demo purposes --}}
<script src="{{asset('admin/dist/js/select2.min.js')}}"></script>
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<script src="{{asset('admin/dist/js/sweetalert.min.js')}}"></script>

<script>
    function confirmDelete(item_id) {
        swal({
            title: "{{ __('general.Are_you_sure') }}",
            text: "{{ __('general.Once_deleted') }}",
            icon: "warning",
            buttons: ["{{ __('general.no') }}", "{{ __('general.Delete') }}"],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $('.'+item_id).submit();
                } else {
                    swal("{{ __('general.Cancelled_Successfully') }}");
                }
            });
    }
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>

</body>
</html>
