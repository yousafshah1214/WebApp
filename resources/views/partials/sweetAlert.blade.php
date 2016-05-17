<script type="text/javascript">
    @if(Session::has("successMessage"))
        sweetAlert( "{!! Session::get('successMessage') !!}");
    @endif
    @if(Session::has("failureMessage"))
        sweetAlert("Oops...","{!! Session::get('failureMessage') !!}","error");
    @endif
</script>