@if(session('success'))


<script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'mid-end',
        showConfirmButton: false,
        timer: 1500
      });


      toastr.success("{{ session('success') }}")

    });

  </script>

@endif


@if(session('error'))


<script type="text/javascript">
    $(function() {
      const Toast = Swal.mixin({
        toast: true,
        position: 'mid-center',
        showConfirmButton: false,
        timer: 1500
      });


      toastr.error("{{ session('error') }}")

    });

  </script>


@endif
