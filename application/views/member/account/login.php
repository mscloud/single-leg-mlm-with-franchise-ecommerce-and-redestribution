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

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">YLIFE <b>BSB</b></a>
            <small>Enter into a new world here </small>
        </div>
        <div class="card">
            <div class="body">
                <?php echo form_open ("member/account/login",array('id' => 'sign_in')); ?>
                    <div class="msg">Sign in to start your session</div>
                    <?php if(isset($status)) { ?>
                        <?php if ($status === 3) { ?>
                            <div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Incorrect password.
                            </div>
                        <?php } else if ($status === FALSE) { ?>
                            <div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Something went wrong. 
                            </div>
                        <?php } else if ($status == 2) { ?>
                            <div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                No such member exists. 
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
                            <i class="material-icons">contact_phone</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="mobile" placeholder="Mobile" minlength="10" maxlength="10" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="4" maxlength="8" placeholder="Password" required autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?php echo base_url("member/account/register"); ?>">Register Now!</a>
                        </div>
                        <!--div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div-->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?php echo base_url("member/plugins/jquery/jquery.min.js"); ?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url("member/plugins/bootstrap/js/bootstrap.js"); ?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url("member/plugins/node-waves/waves.js"); ?>"></script>

    <!-- Validation Plugin Js -->
    <script src="<?php echo base_url("member/plugins/jquery-validation/jquery.validate.js"); ?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url("member/js/admin.js"); ?>"></script>
    <script src="<?php echo base_url("member/js/pages/examples/sign-in.js"); ?>"></script>
</body>

</html>