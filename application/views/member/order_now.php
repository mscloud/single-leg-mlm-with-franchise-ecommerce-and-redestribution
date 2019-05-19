    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <?php if(isset($status)) { ?>
                <?php if ($status === TRUE) { ?>
                    <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Order has been placed successfully.
                    </div>
                <?php } else { ?>
                    <div class="alert bg-red alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $status; ?>
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
                                <?php foreach ($products as $row): ?>
                                    <?php echo form_open('member/order_now'); ?>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="card">
                                                <div class="header bg-red">
                                                    <input type="hidden" name="product" value="<?php echo $row->pID; ?>">
                                                    <h2><?php echo $row->Name; ?> <small>Price - <?php echo $row->Price; ?> INR only</small></h2>
                                                </div>
                                                <div class="body">
                                                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                                        <img class="img-responsive" src="<?php echo base_url('public/products/'.$row->image); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-5 col-sm-5 col-xs-5">
                                                            <div class="form-line">
                                                                <input type="text" id="quantity" name="qty" class="form-control" placeholder="Quantity">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-sm-7 col-xs-7">
                                                            <div class="form-line">
                                                                <select class="form-control" name="method" >
                                                                    <option value="online">Pay Online</option>
                                                                    <option value="cod">Cash on Delivery</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Order Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    