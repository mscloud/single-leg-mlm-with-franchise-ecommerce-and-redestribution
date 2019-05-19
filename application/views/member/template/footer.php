    <script src="<?php echo base_url("member/plugins/jquery/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("member/plugins/bootstrap/js/bootstrap.js"); ?>"></script>
    <script src="<?php echo base_url("member/plugins/bootstrap-select/js/bootstrap-select.js"); ?>"></script>
    <script src="<?php echo base_url("member/plugins/jquery-slimscroll/jquery.slimscroll.js"); ?>"></script>
    <script src="<?php echo base_url("member/plugins/node-waves/waves.js"); ?>"></script>
    <script src="<?php echo base_url("member/plugins/autosize/autosize.js"); ?>"></script>
    <script src="<?php echo base_url("member/plugins/momentjs/moment.js"); ?>"></script>
    <script src="<?php echo base_url("member/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"); ?>"></script>
    <script src="<?php echo base_url("member/js/admin.js"); ?>"></script>
    <script src="<?php echo base_url("member/js/pages/forms/basic-form-elements.js"); ?>"></script>
    <script src="<?php echo base_url("member/js/demo.js"); ?>"></script>
    <script>
        $(document).ready(function(){
            $(".sponsor").keyup(function(){ 
                var dataString = 'sponsor=' + $('.sponsor').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url("admin/sponsor"); ?>",
                    data: dataString,
                    cache: false,
                    success: function(res){
                        $('#sponsor').html(res);
                    }
                });
            });
        });
    </script>
    <!--script src="<?php echo base_url("member/js/pages/medias/image-gallery.js"); ?>"></script -->
</body>
</html>