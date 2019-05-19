    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <?php if(isset($status)) { ?>
                    <?php if ($status === TRUE) { ?>
                        <div class="alert bg-green alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Information updated successfully.
                        </div>
                    <?php } else if ($status === FALSE) { ?>
                        <div class="alert bg-red alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Something went wrong.
                        </div>
                    <?php } ?>
                <?php } ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header"><h2>Withdraw requests:</h2></div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>S no.</th>
                                            <th>Member</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; foreach ($requests as $row): ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row->Name; ?></td>
                                            <td><?php echo $row->amount; ?></td>
                                            <td><?php echo $row->date; ?></td>
                                            <td>
                                                <?php echo form_open ("admin/withdraw_requests",array("enctype"=>"multipart/form-data")); ?>
                                                    <div class="col-md-8 clearfix">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
                                                                <input type="text" class="form-control" name="remarks" placeholder="Remarks" reuired>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" name="submit" value="success" class="btn btn-primary btn-lg waves-effect">Paid</button>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="submit" name="submit" value="cancel" class="btn btn-danger btn-lg waves-effect">Cancel</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php $i++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>