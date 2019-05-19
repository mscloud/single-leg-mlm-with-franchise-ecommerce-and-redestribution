    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Stock</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Branch</th>
                                            <th>Quantity</th>
                                            <th>Stock report</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($stock as $row): ?>
                                        <tr>
                                            <td><?php echo $row->Name; ?></td>
                                            <td><?php echo $row->brName; ?></td>
                                            <td><?php echo $row->qty; ?> Unit(s)</td>
                                            <td>
                                                <button type="button" class="btn btn-default waves-effect m-r-20" title="Stock" data-toggle="modal" data-target="#defaultModal<?php echo $row->brID; ?>">
                                                    <i class="material-icons">report</i>
                                                </button>
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
            <!-- Default Size -->
            <?php foreach ($stock as $row): ?>
                <div class="modal fade" id="defaultModal<?php echo $row->brID; ?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                <!-- Select -->
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Branch</th>
                                                                <th>Quantity</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($stock_report as $row1): ?>
                                                            <?php if ($row->brID == $row1->brID) { ?>
                                                                <tr>
                                                                    <td><?php echo $row1->Name; ?></td>
                                                                    <td><?php echo $row1->brName; ?></td>
                                                                    <td><?php echo $row1->qty; ?> Unit(s)</td>
                                                                    <td><?php echo $row1->stDate; ?></td>
                                                                </tr>
                                                            <?php } endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- #END# Select -->
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success waves-effect">SAVE CHANGES</button>
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    