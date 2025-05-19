@if(Session::has('toastr'))
    <script>
        $(document).ready(function() {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            
            @if(Session::has('toastr.error'))
                toastr.error("{{ Session::get('toastr.message') }}", "{{ Session::get('toastr.title') }}");
            @endif
            
            @if(Session::has('toastr.success'))
                toastr.success("{{ Session::get('toastr.message') }}", "{{ Session::get('toastr.title') }}");
            @endif
            
            @if(Session::has('toastr.info'))
                toastr.info("{{ Session::get('toastr.message') }}", "{{ Session::get('toastr.title') }}");
            @endif
            
            @if(Session::has('toastr.warning'))
                toastr.warning("{{ Session::get('toastr.message') }}", "{{ Session::get('toastr.title') }}");
            @endif
        });
    </script>
@endif
