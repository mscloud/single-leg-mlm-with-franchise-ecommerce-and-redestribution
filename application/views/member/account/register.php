<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $title; ?> | YLIFE</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url("member/favicon.ico"); ?>" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url("member/plugins/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url("member/plugins/node-waves/waves.css"); ?>" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url("member/plugins/animate-css/animate.css"); ?>" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url("member/css/style.css"); ?>" rel="stylesheet">
</head>

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">YLIFE <b>BSB</b></a>
            <small>Start to a new world here</small>
        </div>
        <div class="card">
            <div class="body">
                <?php echo form_open ("member/account/register",array('id' => 'sign_up')); ?>
                    <div class="msg">Register a new membership</div>
                    <?php if(isset($status)) { ?>
                        <?php if ($status === TRUE) { ?>
                            <div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Account has been created successfully.<br>
                                Your user-id is <strong>YLF<?php echo $this->input->post('contact'); ?></strong> and Password is 
                                <strong><?php echo $this->input->post('password'); ?></strong><br>
                                Thanks to be a part us.
                            </div>
                        <?php } else if ($status === FALSE) { ?>
                            <div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Something went wrong. 
                            </div>
                        <?php } else if ($status == 2) { ?>
                            <div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Sponsor doesn't exist. 
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <?php $x = validation_errors(); ?>
                    <?php if ($x != '') { ?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo $x; ?>
                        </div>
                    <?php } ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">perm_identity</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control sponsor" name="sponsor" placeholder="Sponsor ID" autofocus>
                        </div>
                        <label id="sponsor" class="error" for="sponsor" style="display: block;">No match found</label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Your Name" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">contact_phone</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="contact" placeholder="Mobile " required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="4" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="4" placeholder="Confirm Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="<?php echo base_url("member/account/login"); ?>">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url("member/plugins/jquery/jquery.min.js"); ?>"></script>
    <script src="<?php echo base_url("member/plugins/bootstrap/js/bootstrap.js"); ?>"></script>
    <script src="<?php echo base_url("member/plugins/node-waves/waves.js"); ?>"></script>
    <script src="<?php echo base_url("member/plugins/jquery-validation/jquery.validate.js"); ?>"></script>
    <script src="<?php echo base_url("member/js/admin.js"); ?>"></script>
    <script src="<?php echo base_url("member/js/pages/examples/sign-up.js"); ?>"></script>
    <script>
        $(document).ready(function(){
            $(".sponsor").keyup(function(){
                var dataString = 'sponsor=' + $('.sponsor').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url("member/account/sponsor"); ?>",
                    data: dataString,
                    cache: false,
                    success: function(res){
                        $('#sponsor').html(res);
                    }
                });
            });
        });
    </script>
</body>

</html>