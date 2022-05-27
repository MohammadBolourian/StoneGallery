<script src="{{asset('admin-assets/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('front-assets/js/colcade.js')}}"></script>
<script src="{{asset('front-assets/js/bootstrap.min.js')}}"></script>
<script>

    $(document).scroll(function() {
        $('#menu').toggle($(this).scrollTop()<1700)
    });

</script>
