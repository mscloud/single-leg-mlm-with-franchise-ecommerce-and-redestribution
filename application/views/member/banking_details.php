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
                                Banking details
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
                            <?php echo form_open ("member/banking_details"); ?>
                                <div class="row clearfix">
                                    <div class="col-md-5">
                                        <p><b>Bank Name</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="bank" value="<?php echo $member->Bank; ?>" placeholder="Bank" <?php if(!empty($member->Bank)) echo "readonly"; ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-2">
                                        <p><b>Branch Name</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="branch" value="<?php echo $member->Branch; ?>" placeholder="Branch" <?php if(!empty($member->Branch)) echo "readonly"; ?>>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-5">
                                        <p><b>Account No.</b></p>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date" name="account" value="<?php echo $member->Account; ?>" placeholder="Account No." <?php if(!empty($member->Account)) echo "readonly"; ?>>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-2">
                                        <p><b>IFS Code</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" value="<?php echo $member->IFSC; ?>" name="ifsc" placeholder="IFS Code" <?php if(!empty($member->IFSC)) echo "readonly"; ?>>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <p><b>Pancard</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="pancard" value="<?php echo $member->Pancard; ?>" placeholder="Pancard"  <?php if(!empty($member->Pancard)) echo "readonly"; ?>>
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