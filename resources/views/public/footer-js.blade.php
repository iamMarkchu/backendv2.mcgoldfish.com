<script src="/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>
<script src="/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="/media/js/bootstrap.min.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="/media/js/excanvas.min.js"></script>
<script src="/media/js/respond.min.js"></script>  
<![endif]-->
<script src="/media/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/media/js/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/media/js/jquery.cookie.min.js" type="text/javascript"></script>
<script src="/media/js/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/media/js/app.js" type="text/javascript"></script>
@foreach($ownjs as $js)
<script src="{{$js}}"></script>
@endforeach
<script type="text/javascript">
    $(function () {
        App.init();
    });
</script>