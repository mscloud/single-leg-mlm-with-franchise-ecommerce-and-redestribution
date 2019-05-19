    <?php if ($page == 'wallet') { ?>
    <section class="content">
        <div class="container-fluid">
            <!-- Counter Examples -->
            <div class="block-header">
                <h2>
                    WALLET BALANCE:
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">Current Balance</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $member->Balance; ?>" data-speed="1000" data-fresh-interval="20"><?php echo $member->Balance; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Chart Samples -->
        </div>
    </section>
    <?php } else if ($page == 'withdraw') { ?>
    <section class="content">
        <div class="container-fluid">
            <!-- Counter Examples -->
            <div class="block-header">
                <h2>
                    FUND WITHDRAW:
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">Current Balance</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $member->Balance; ?>" data-speed="1000" data-fresh-interval="20"><?php echo $member->Balance; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header"><h2>Fund Withdaw Request</h2></div>
                        <div class="body">
                            <?php if(isset($status)) { ?>
                                <?php if ($status === TRUE) { ?>
                                    <div class="alert bg-green alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        Request has been submited successfully.
                                    </div>
                                <?php } else if ($status === FALSE) { ?>
                                    <div class="alert bg-red alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        Something went wrong.
                                    </div>
                                <?php } else { ?>
                                    <div class="alert bg-red alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <?php echo $status; ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <?php echo form_open ("member/withdraw",array("enctype"=>"multipart/form-data")); ?>
                                <div class="row clearfix">
                                    <div class="col-md-3">
                                        <p><b>Request withdaw</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="number" class="form-control" name="amount" placeholder="Amount" reuired>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><br>
                                        <button style="margin-top:10px;" type="submit" class="btn btn-primary btn-lg waves-effect">Request</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header"><h2>Fund Withdaw Status</h2></div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="20px">Serial no.</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Process Date</th>
                                            <th>Remark</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($withdrawls as $row): ?>
                                        <tr style="<?php if ($row->cStatus == 'C') echo 'background-color: #F0C3B9 !important;'; 
                                                        else if ($row->cStatus == 'Y') echo 'background-color: #D1ECB9 !important;'; else echo 'background-color: yellow !important;';?>">
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->amount; ?></td>
                                            <td><?php echo substr($row->date,0,10); ?></td>
                                            <td><?php if ($row->pr_date != "0000-00-00 00:00:00") echo substr($row->pr_date,0,10); ?></td>
                                            <td><?php echo $row->remarks; ?></td>
                                        </tr>
                                        <?php $i++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Chart Samples -->
        </div>
    </section>
    <?php } ?>
    
    
    
    
    