    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PROFILE</h2>
            </div>
            <!-- Color Pickers -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Personal Information
                                <small>You can update it only once.</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <?php if(isset($status)) { ?>
                                <?php if ($status === TRUE) { ?>
                                    <div class="alert bg-green alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        Information updated.
                                    </div>
                                <?php } else if ($status === FALSE) { ?>
                                    <div class="alert bg-red alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        Something went wrong. 
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
                            <?php echo form_open ("member/nominee_details"); ?>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <p><b>Nominee Name</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="nominee_name" value="<?php echo $member->nominee_name; ?>" placeholder="Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p><b>Guardian</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="nominee_guardian" value="<?php echo $member->nominee_guardian; ?>" placeholder="Father/ husband/ Wife">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p><b>Address</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="nominee_address" value="<?php echo $member->nominee_address; ?>" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p><b>Date of Birth</b></p>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date" name="nominee_dob"  value="<?php echo $member->nominee_dob; ?>" placeholder="Ex: 30/07/2016">
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <p><b>Relation</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php echo $member->nominee_relation; ?>" name="nominee_relation" placeholder="Relation">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><br><br>
                                        <button type="submit" class="btn btn-primary btn-lg waves-effect">UPDATE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>