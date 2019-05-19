    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <?php if(isset($status)) { ?>
                        <?php if ($status === TRUE) { ?>
                            <div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Information has been updated.
                            </div>
                        <?php } else if ($status === FALSE) { ?>
                            <div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Somthing went wrong.
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <div class="card">
                        <div class="header"><h2>My Orders</h2></div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Product</th>
                                            <th>Order Details</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orders as $row): ?>
                                            <tr>
                                                <td>
                                                    User ID: <strong>YLF<?php echo $row->Contact; ?></strong><br>
                                                    Name: <strong><?php echo $row->Name; ?></strong><br>
                                                    Contact: <strong><?php echo $row->Contact; ?></strong><br>
                                                </td>
                                                <td><?php echo $row->prName; ?></td>
                                                <td>
                                                    Quantity: <strong><?php echo $row->qty; ?> Unit(s)</strong><br>
                                                    Total Price: <strong><?php echo $row->tPrice; ?> INR</strong><br>
                                                    Order Date: <strong><?php echo substr($row->oDate,0,10); ?></strong>
                                                </td>
                                                <td>
                                                    Address: <strong><?php echo $row->Address; ?></strong><br>
                                                    City: <strong><?php echo $row->City; ?>, <?php echo $row->State; ?></strong><br>
                                                    Country: <strong><?php echo $row->Country; ?></strong><br>
                                                    Pincode: <strong><?php echo $row->Pincode; ?></strong><br>
                                                </td>
                                                <td>
                                                    Payment method: <strong><?php
                                                        if ($row->pMethod == 'P') echo 'Online Payment';
                                                        else echo 'Cash on Delivery';
                                                    ?></strong><br>
                                                    Payment Status: <strong><?php
                                                        if ($row->pStatus == 'Y') echo '<span class="label label-success">Paid</span>';
                                                        else echo '<span class="label label-info">Unpaid</span>';
                                                    ?></strong><br>
                                                    Order Status: <strong><?php 
                                                        if ($row->oStatus == 'H') echo '<span class="label label-primary">Order Placed</span>';
                                                        else if ($row->oStatus == 'D') echo '<span class="label label-success">Delivered</span>';
                                                        else if ($row->oStatus == 'C') echo '<span class="label label-danger">Cancelled</span>';
                                                        else echo "Unknown";
                                                    ?></strong>
                                                </td>
                                                <td>
                                                    <?php if ($row->oStatus == 'H') { echo form_open('shop/new_orders'); ?>
                                                    <input type="hidden" name="order" value="<?php echo $row->oID; ?>">
                                                        <button type="submit" name="deliver"value="deliver" class="btn btn-success waves-effect m-r-20" title="check availability">
                                                            <i class="material-icons">check</i>
                                                        </button>
                                                        <button type="submit" name="cancel" value="cancel" class="btn btn-danger waves-effect m-r-20" title="check availability">
                                                            <i class="material-icons">cancel</i>
                                                        </button>
                                                    </form>
                                                    <?php } else { ?>
                                                        <a class="btn btn-success waves-effect m-r-20" title="check availability">
                                                            <i class="material-icons">clear</i>
                                                            <span>Not Permitted</span>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>