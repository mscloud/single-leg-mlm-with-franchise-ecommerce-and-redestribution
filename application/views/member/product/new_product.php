    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Product</h2>
            </div>
            <!-- Color Pickers -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                New Product
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
                                        Prodcut has been uploaded.
                                    </div>
                                <?php } else if ($status === FALSE) { ?>
                                    <div class="alert bg-red alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        Somthing went wrong.
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <?php echo form_open ("shop/new_product",array("enctype"=>"multipart/form-data")); ?>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <p><b>Product Name</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="name" placeholder="Product" reuired>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-5">
                                        <p><b>Pice</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="price" placeholder="Price" reuired>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-2">
                                        <p><b>Product Code</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="code" placeholder="Product Code">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-5">
                                        <p><b>Category</b></p>
                                        <select class="form-control show-tick" name="category">
                                            <option value="">Salect</option>
                                            <?php foreach ($category as $row): ?>
                                            <option value="<?php echo $row->cID; ?>"><?php echo $row->cName; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-5 col-md-offset-2">
                                        <p><b>Sub-category</b></p>
                                        <select class="form-control show-tick" name="subcat">
                                            <option value="">Salect</option>
                                            <?php foreach ($subcat as $row): ?>
                                            <option value="<?php echo $row->cID; ?>"><?php echo $row->SubName; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-5">
                                        <p><b>DP</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="dp" placeholder="DP">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-md-offset-2">
                                        <p><b>B.V.</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="bv" placeholder="BV">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <p><b>Product description</b></p>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea  name="description" rows="1" class="form-control no-resize auto-growth" placeholder="Please type what you want... And please don't forget the ENTER key press multiple times :)"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <p><b>Product Type</b></p>
                                        <select class="form-control show-tick" name="type">
                                            <option value="">Salect</option>
                                            <option value="S">Single Product</option>
                                            <option value="P">Product Package</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <p><b>Product Image</b></p>
                                        <select class="form-control show-tick" name="image">
                                            <?php foreach ($images as $row): ?>
                                                <option value="<?php echo $row->imgName; ?>">
                                                    <?php echo $row->name; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"><br>
                                        <button style="margin-top:10px;" type="submit" class="btn btn-primary btn-lg waves-effect">UPLOAD</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>