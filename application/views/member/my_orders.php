    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header"><h2>My Orders</h2></div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total Price</th>
                                            <th>Order Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($orders as $row): ?>
                                            <tr>
                                                <td><?php echo $row->Name; ?></td>
                                                <td><?php echo $row->qty; ?> Unit(s)</td>
                                                <td><?php echo $row->uPrice; ?> INR</td>
                                                <td><?php echo $row->tPrice; ?> INR</td>
                                                <td><?php echo substr($row->oDate,0,10); ?></td>
                                                <td>
                                                    <?php
                                                        if ($row->oStatus == 'H') echo 'Order placed';
                                                        else if ($row->oStatus == 'D') echo 'Delivered';
                                                        else if ($row->oStatus == 'C') echo 'Cancelled';
                                                    ?>
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