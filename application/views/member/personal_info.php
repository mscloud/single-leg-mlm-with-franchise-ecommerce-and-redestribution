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
                            <?php echo form_open ("member/personal_info"); ?>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <p><b>Father / Husband</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="father_husband" value="<?php echo $member->Father_husband; ?>" placeholder="Father / Husband">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <p><b>Gender</b></p>
                                        <select class="form-control show-tick" name="gender">
                                            <option value="<?php echo $member->Gender; ?>">Select</option>
                                            <option value="M">Male</option>
                                            <option value="F">Female</option>
                                            <option value="O">Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <p><b>Date of Birth</b></p>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date" name="dob"  value="<?php echo $member->DOB; ?>" placeholder="Ex: 30/07/2016">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <p><b>Occupation</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php echo $member->Occupation; ?>" name="occupation" placeholder="Occupation">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <p><b>Address</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php echo $member->Address; ?>" name="address" placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <p><b>City</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php echo $member->City; ?>" name="city" placeholder="City">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <p><b>State</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php echo $member->State; ?>" name="state" placeholder="State">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <p><b>Country</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="country" placeholder="India" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <p><b>Pincode</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="pin" value="<?php echo $member->Pincode; ?>" placeholder="Pincode" >
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
            <!-- #END# Color Pickers -->
            <!-- File Upload | Drag & Drop OR With Click & Choose >
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FILE UPLOAD - DRAG & DROP OR WITH CLICK & CHOOSE
                                <small>Taken from <a href="http://www.dropzonejs.com/" target="_blank">www.dropzonejs.com</a></small>
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
                            <form action="/" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                                <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Drop files here or click to upload.</h3>
                                    <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em>
                                </div>
                                <div class="fallback">
                                    <input name="file" type="file" multiple />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
        </div>
    </section>