    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <?php if(isset($status)) { ?>
                <?php if ($status === TRUE) { ?>
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Information has been updated.
                    </div>
                <?php } else if ($status === FALSE) { ?>
                    <div class="alert bg-red alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Something went wrong.
                    </div>
                <?php } ?>
            <?php } ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Products</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <tr>
                                        <th colspan="7">
                                            <button type="button" class="btn btn-default waves-effect m-r-20" title="Stock" data-toggle="modal" data-target="#defaultModal">
                                                <i class="material-icons">shop</i>
                                            </button>
                                        </th>
                                    </tr>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>DP</th>
                                            <th>BV</th>
                                            <th>Product Code</th>
                                            <th>Price</th>
                                            <th>Product Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($products as $row): ?>
                                        <tr>
                                            <td><?php echo $row->Name; ?></td>
                                            <td><?php echo $row->DP; ?></td>
                                            <td><?php echo $row->BV; ?></td>
                                            <td><?php echo $row->ProductCode; ?></td>
                                            <td><?php echo $row->Price; ?> INR</td>
                                            <td><?php echo $row->ProductType; ?></td>
                                            <td>
                                                <a class="btn btn-default waves-effect m-r-20" href="<?php echo base_url('shop/stock?q='. $row->pID); ?>" title="check availability">
                                                    <i class="material-icons">report</i>
                                                </a>
                                                <a class="btn btn-default waves-effect m-r-20" href="" title="check availability">
                                                    <i class="material-icons">account_balance</i>
                                                </a>
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
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                        </div>
                        <?php echo form_open("shop/products"); ?>
                            <div class="modal-body">
                                <!-- Select -->
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="body">
                                                <div class="row clearfix">
                                                    <div class="col-sm-4">
                                                        <select class="form-control show-tick" name="branch" required>
                                                            <option value="">-- Please select --</option>
                                                            <?php foreach ($branches as $row): ?>
                                                                <option value="<?php echo $row->brID; ?>"><?php echo $row->brName; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <select class="form-control show-tick" name="product" required>
                                                            <option value="">-- Please select --</option>
                                                            <?php foreach ($products as $row): ?>
                                                                <option value="<?php echo $row->pID; ?>"><?php echo $row->Name; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" placeholder="Quantity" name="qty" required/>
                                                            </div>
                                                        </div>
                                                    </div>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    