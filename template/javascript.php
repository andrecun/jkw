<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- Jquery JS -->
<script type="text/javascript" src="<?php echo $url_rewrite; ?>assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="<?php echo $url_rewrite; ?>plugin/bootstrap-3.1.1/js/bootstrap.min.js"></script>

<!-- Jquery UI JS -->
<script type="text/javascript" src="<?php echo $url_rewrite; ?>plugin/jquery-ui/jquery-ui.js"></script>

<!-- Bootstrap Image Gallery JS -->
<script src="<?php echo $url_rewrite; ?>plugin/bootstrap-image-gallery-3.1.1/js/jquery.blueimp-gallery.min.js"></script>
<script src="<?php echo $url_rewrite; ?>plugin/bootstrap-image-gallery-3.1.1/js/bootstrap-image-gallery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    	var staticDate = $("#static_date").val();
        $('#datepicker').datepicker({
            inline: true,
            defaultDate: staticDate
        });

        // INITIATE GALLERY PLUGIN
    	$('#blueimp-gallery').toggleClass('blueimp-gallery-controls', true);
    });
</script>